<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderData;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\States;
use App\Models\User;
use App\Models\UserAddress;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        if ($product == null) {
            return response()->json([
                'status' => false,
                'message' => 'Product id not found',
            ]);
        }

        if (Cart::count() > 0) {
            $productFlag = false;
            $cartData = Cart::content();

            foreach ($cartData as $ci) {
                if ($ci->id == $request->id) {
                    $productFlag = true;
                }
            }

            if ($productFlag == false) {
                Cart::add($product->id, $product->productName, 1, $product->ourPrice, [
                    'productImage' => $product->productImage
                ]);

                $statusSuccess = true;
                $message = $product->productName . ' will be added successfully';

            } else {
                $statusSuccess = false;
                $message = 'Product already exists';
            }

        } else {
            Cart::add($product->id, $product->productName, 1, $product->ourPrice, [
                'productImage' => $product->productImage
            ]);

            $statusSuccess = true;
            $message = $product->productName . ' will be added successfully';
        }


        return response()->json([
            'status' => $statusSuccess,
            'message' => $message,
        ]);
    }

    public function renderCart()
    {

        $cartData = Cart::content();
        $cartItemsCount = Cart::count();
        return view('cartPage', compact('cartData', 'cartItemsCount'));
    }

    public function updateCartItems(Request $request)
    {
        Cart::update($request->rowId, $request->qty);

        $statusSuccess = true;
        $message = 'item updated';
        return response()->json([
            'status' => $statusSuccess,
            'message' => $message,
        ]);
    }

    public function deleteCartItem(Request $request)
    {
        $itemId = Cart::get($request->rowId);
        if ($itemId === null) {
            return response()->json([
                'status' => false,
                'message' => 'Id not found'
            ]);
        }

        Cart::remove($request->rowId);
        return response()->json([
            'status' => true,
            'message' => 'Item Deleted successfully'
        ]);
    }

    public function getCheckout()
    {
        if (Cart::count() === 0) {
            return redirect()->route('cartPage');
        }

        $coupon = null;
        $discount = 0;
        $cartTotal = (float) Cart::total(2, '.', '');

        if (session()->has('code')) {
            $coupon = Coupon::where('code', session('code'))->first();
            if ($coupon) {
                if ($coupon->usage_limit === 0) {
                    return response()->json([
                        'status' => false,
                        'message' => "Coupon usage limit has been reached."
                    ]);
                }
                $discount = ($coupon->type === 'percent') ? $cartTotal * ($coupon->value / 100) : (float) $coupon->value;
            }
        }

        $totalAfterDiscount = $cartTotal - $discount;

        return view('checkoutPage', [
            'cartData' => Cart::content(),
            'states' => States::orderBy('state_name', 'asc')->get(),
            'shippingAddresses' => ShippingAddress::with('state')->where('user_id', Auth::id())->get(),
            'paymentDetails' => Payment::orderBy('created_at', 'desc')->where('user_id', Auth::id())->get(),
            'shippingAddress' => ShippingAddress::with('state')->where('user_id', Auth::id())->first(),
            'discount' => $discount,
            'total' => $totalAfterDiscount
        ]);
    }

    public function postCheckoutProcess(Request $request)
    {
        $state = States::where('state_code', $request->shipping_state)->first();

        if (!$state) {
            return back()->withErrors(['shipping_state' => 'Invalid state selected.']);
        }
        $request->merge([
            'shipping_mobile_number' => str_replace(' ', '', $request->shipping_mobile_number)
        ]);
        $validator = Validator::make($request->all(), [
            'shipping_full_name' => 'required|string|max:100',
            'shipping_email' => 'required|email|max:255',
            'shipping_mobile_number' => 'required|digits:10|regex:/^[0-9]{10}$/',
            'shipping_house' => 'required|string|max:255',
            'shipping_city' => 'required|string|max:100',
            'shipping_state' => 'required|string|exists:states,state_code',
            'shipping_zipcode' => 'required|digits:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        $user = Auth::user();


        if ($request->filled('selected_shipping_address_id')) {
            $sa = ShippingAddress::find($request->selected_shipping_address_id);
        } else {
            $sa = new ShippingAddress();
            $sa->user_id = $user->id;
            $sa->shipping_full_name = $request->shipping_full_name;
            $sa->shipping_email = $request->shipping_email;
            $sa->shipping_mobile_number = $request->shipping_mobile_number;
            $sa->shipping_house = $request->shipping_house;
            $sa->shipping_city = $request->shipping_city;
            $sa->states_id = $state->id;
            $sa->shipping_zipcode = $request->shipping_zipcode;
            $sa->save();
        }

        if ($request->DeliveryOption == 'COD') {
            $order = new Order();

            $coupon = null;
            $couponTag = null;
            $couponAmount = 0;
            $discount = 0;
            $cartTotal = (float) Cart::total(2, '.', '');

            if (session()->has('code')) {
                $coupon = Coupon::where('code', session('code'))->first();
                if ($coupon) {
                    if ($coupon->usage_limit === 0) {
                        return response()->json([
                            'status' => false,
                            'errors' => ['coupon' => 'Coupon usage limit has been reached.']
                        ]);
                    }
                    $discount = ($coupon->type === 'percent')
                        ? $cartTotal * ($coupon->value / 100)
                        : (float) $coupon->value;
                    $couponTag = $coupon->id;
                    $couponAmount = $discount;
                    $coupon->decrement('usage_limit', 1);
                }
            }

            $cartSubtotal = Cart::Subtotal();
            $tax = Cart::Tax();
            $grandTotal = $cartTotal - $discount;

            $formattedSubtotal = str_replace(',', '', $cartSubtotal);
            $formattedTax = str_replace(',', '', $tax);
            $formattedSubtotal = (float) $formattedSubtotal;
            $formattedTax = (float) $formattedTax;
            $totalAmount = $grandTotal;
            $order->subtotal = $formattedSubtotal;
            $order->others_tax = $formattedTax;
            $order->total_amount = $totalAmount;
            $order->coupon_id = $couponTag;
            $order->discount = $couponAmount;
            $order->user_id = $user->id;
            $order->full_name = $request->shipping_full_name;
            $order->email = $request->shipping_email;
            $order->mobile_number = $request->shipping_mobile_number;
            $order->house = $request->shipping_house;
            $order->city = $request->shipping_city;
            $order->states_id = $state->id;
            $order->zipcode = $request->shipping_zipcode;
            $order->shipping_id = $sa->id;
            $order->shipped_date = Carbon::today()->addDays(8)->startOfDay();
            $order->delivered_date = Carbon::today()->addDays(15)->startOfDay();
            $order->payment_status = 'unpaid';
            $order->save();

            foreach (Cart::content() as $c) {
                $od = new OrderData();
                $od->product_id = $c->id;
                $od->order_id = $order->id;
                $od->name = $c->name;
                $od->quantity = $c->qty;
                $od->price = $c->price;
                $od->total = $c->price * $c->qty;
                $od->save();
            }

            orderMail($order->id, 'customer');

            Cart::destroy();

            return response()->json([
                'status' => true,
                'oId' => $order->id,
                'message' => 'Order has been placed successfully'
            ]);

        } else {

            $request->merge([
                'card_number' => str_replace(' ', '', $request->card_number)
            ]);

            $validator = Validator::make($request->all(), [
                'card_name' => 'required|string|max:255',
                'card_owner_name' => 'required|string|max:255',
                'card_number' => 'required|digits:16',
                'mm' => 'required|digits:2|numeric|min:01|max:12',
                'yy' => 'required|digits:2|numeric|min:00|max:99',
                'cvv' => 'required|digits:3|numeric',
            ], [
                'card_number.digits' => 'Card number must be exactly 16 digits.',
                'mm.digits' => 'Expiration month must be 2 digits.',
                'yy.digits' => 'Expiration year must be 2 digits.',
                'cvv.digits' => 'CVV must be exactly 3 digits.',
                'mm.min' => 'Expiration month must be between 01 and 12.',
                'mm.max' => 'Expiration month must be between 01 and 12.',
                'yy.min' => 'Expiration year must be between 00 and 99.',
                'yy.max' => 'Expiration year must be between 00 and 99.',
                'cvv.numeric' => 'CVV must contain only numeric values.',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->errors()
                ]);
            }


            $coupon = null;
            $couponTag = 0;
            $couponAmount = 0;
            $discount = 0;
            $cartTotal = (float) Cart::total(2, '.', '');

            if (session()->has('code')) {
                $coupon = Coupon::where('code', session('code'))->first();
                if ($coupon) {
                    if ($coupon->usage_limit === 0) {
                        return response()->json([
                            'status' => false,
                            'errors' => ['coupon' => 'Coupon usage limit has been reached.']
                        ]);
                    }
                    $discount = ($coupon->type === 'percent')
                        ? $cartTotal * ($coupon->value / 100)
                        : (float) $coupon->value;
                    $couponTag = $coupon->id;
                    $couponAmount = $discount;
                    $coupon->decrement('usage_limit', 1);
                }
            }

            $grandTotal = $cartTotal - $discount;

            if (filled('payment_id')) {
                $payment = Payment::find($request->payment_id);
            } else {
                $payment = new Payment();
                $payment->user_id = $user->id;
                $payment->card_name = $request->card_name;
                $payment->card_owner_name = $request->card_owner_name;
                $payment->card_number = $request->card_number;
                $payment->mm = $request->mm;
                $payment->yy = $request->yy;
                $payment->cvv = $request->cvv;
                $payment->save();
            }

            $order = new Order();
            $cartSubtotal = Cart::Subtotal();
            $tax = Cart::Tax();
            $cartTotal = Cart::Total();
            $formattedSubtotal = str_replace(',', '', $cartSubtotal);
            $formattedTax = str_replace(',', '', $tax);
            $formattedTotalAmount = str_replace(',', '', $cartTotal);
            $formattedSubtotal = (float) $formattedSubtotal;
            $formattedTax = (float) $formattedTax;
            $formattedTotalAmount = (float) $formattedTotalAmount;

            $order->subtotal = $formattedSubtotal;
            $order->others_tax = $formattedTax;
            $order->total_amount = $grandTotal;

            $order->coupon_id = $couponTag;
            $order->discount = $couponAmount;
            $order->user_id = $user->id;
            $order->full_name = $request->shipping_full_name;
            $order->email = $request->shipping_email;
            $order->mobile_number = $request->shipping_mobile_number;
            $order->house = $request->shipping_house;
            $order->city = $request->shipping_city;
            $order->states_id = $state->id;
            $order->zipcode = $request->shipping_zipcode;
            $order->shipping_id = $sa->id;
            $order->shipped_date = Carbon::today()->addDays(8)->startOfDay();
            $order->delivered_date = Carbon::today()->addDays(15)->startOfDay();
            $order->payment_id = $payment->id;
            $order->save();

            foreach (Cart::content() as $c) {
                $od = new OrderData();
                $od->product_id = $c->id;
                $od->order_id = $order->id;
                $od->name = $c->name;
                $od->quantity = $c->qty;
                $od->price = $c->price;
                $od->total = $c->price * $c->qty;
                $od->save();
            }

            orderMail($order->id, 'customer');
            Cart::destroy();
            session()->forget('code');

            return response()->json([
                'status' => true,
                'oId' => $order->id,
                'message' => 'Order has been placed successfully'
            ]);
        }
    }

    public function OrderSummery($id)
    {
        $orderItems = OrderData::where('order_id', $id)
            ->with('product')
            ->get();
        $order = Order::with('shipping_address')->with('payments')->findOrFail($id);
        return view('orderSummery', compact('order', 'orderItems'));
    }

    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)->first();
        $now = Carbon::now();

        if (!$coupon) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid coupon code'
            ]);
        }

        if (session()->has('code') && session('code') === $coupon->code) {
            return response()->json([
                'status' => false,
                'message' => 'Coupon has already been applied.'
            ]);
        }

        if ($coupon->start_date && $now->lt($coupon->start_date)) {
            return response()->json([
                'status' => false,
                'message' => 'Coupon not yet active'
            ]);
        }

        if ($coupon->end_date && $now->gt($coupon->end_date)) {
            return response()->json([
                'status' => false,
                'message' => 'Coupon has expired'
            ]);
        }

        $cartSubtotal = Cart::subtotal(2, '.', '');

        if ($coupon->min_amount > 0) {
            if ($cartSubtotal < $coupon->min_amount) {
                return response()->json([
                    'status' => false,
                    'message' => "Coupon " . $coupon->code . " is valid for orders over ₹" . number_format($coupon->min_amount, 2) . "."
                ]);
            }
        }

        if ($coupon->usage_limit === 0) {
            return response()->json([
                'status' => false,
                'message' => "Coupon usage limit has been reached."
            ]);
        } else {
            session()->put('code', $coupon->code);
            $discount = 0;
            $cartTotal = (float) Cart::total(2, '.', '');

            $discount = ($coupon->type === 'percent')
                ? $cartTotal * ($coupon->value / 100)
                : (float) $coupon->value;

            $totalAfterDiscount = $cartTotal - $discount;

            return response()->json([
                'status' => true,
                'discount' => number_format($discount, 2),
                'total' => number_format($totalAfterDiscount, 2),
                'message' => " " . $coupon->code . " Coupon applied successfully"
            ]);
        }

    }

    public function removeCouponFromCheckout(Request $request)
    {
        session()->forget('code');
        return response()->json([
            'status' => true,
            'message' => "Coupon remove successfully"
        ]);
    }
}