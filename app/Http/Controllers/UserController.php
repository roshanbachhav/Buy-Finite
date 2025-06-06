<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderData;
use App\Models\Payment;
use App\Models\ShippingAddress;
use App\Models\States;
use App\Models\UserAddress;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\returnArgument;

class UserController extends Controller
{
    public function userProfile()
    {
        $user = Auth::user();

        $userDetails = UserAddress::where('user_id', $user->id)->first();

        $state = $userDetails ? States::find($userDetails->state_id) : null;

        return view('userPersonal.userProfile', compact('userDetails', 'state', 'user'));
    }

    public function getEditUserProfile()
    {
        $user = Auth::user();
        $states = States::orderBy('state_name', 'asc')->get();

        $ud = UserAddress::where('user_id', $user->id)->first();

        $state = $ud ? States::find($ud->state_id) : null;

        return view('userPersonal.editUserProfile', compact('ud', 'state', 'states'));
    }

    public function postEditUserProfile(Request $request)
    {

        $request->validate([
            'user_full_name' => 'required|string|max:100',
            'user_email' => 'required|email|max:255',
            'user_mobile_number' => 'required|digits:10|regex:/^[0-9]{10}$/',
            'user_house' => 'required|string|max:255',
            'user_city' => 'required|string|max:100',
            'state_id' => 'required|string|exists:states,id',
            'user_zipcode' => 'required|digits:6',
        ]);

        $user = Auth::user();
        UserAddress::updateOrCreate(
            ['user_id' => $user->id],
            [
                'user_id' => $user->id,
                'user_full_name' => $request->user_full_name,
                'user_email' => $request->user_email,
                'user_mobile_number' => $request->user_mobile_number,
                'user_house' => $request->user_house,
                'user_city' => $request->user_city,
                'state_id' => $request->state_id,
                'user_zipcode' => $request->user_zipcode,
            ]
        );

        return redirect()->route('userProfile')->with('success', "Your Details Update Successfull");

    }
    public function userOrders()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('userPersonal.order', compact('orders', 'user'));
    }
    public function userOrderDetails($id)
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->where('id', $id)->with('coupons')->with('state')->first();
        $orderData = OrderData::where('order_id', $id)->with('product')->get();
        $orderCounts = OrderData::where('order_id', $id)->with('product')->count();
        $location = " " . $orders->house . ", " . $orders->city . ", " . $orders->state->state_name . ", " . $orders->zipcode;
        return view('userPersonal.orderDetails', compact('orders', 'orderData', 'location', 'orderCounts'));
    }
    public function userShipping()
    {
        $user = Auth::user();
        $sa = ShippingAddress::where('user_id', $user->id)->with('state')->orderBy('created_at', 'desc')->paginate(10);
        return view('userPersonal.shipping', compact('sa'));
    }
    public function getAddUserShipping()
    {
        $states = States::orderBy('state_code', 'desc')->get();
        return view('userPersonal.addUserShipping', compact('states'));
    }
    public function postAddUserShipping(Request $request)
    {
        $shippingMessage = "New Shipping added Successfully";

        $request->validate(
            [
                'name' => 'required|string|max:100',
                'email' => 'required|email|max:255',
                'phone_number' => 'required|digits:10',
                'house' => 'required|string|max:255',
                'city' => 'required|string|max:100',
                'state_id' => 'required|exists:states,id',
                'zipcode' => 'required|digits:6',
            ],
            [
                'name.required' => 'Please provide your full name.',
                'name.string' => 'The name must be a valid text.',
                'name.max' => 'Your name may not be greater than 100 characters.',

                'email.required' => 'Please provide your email address.',
                'email.email' => 'Please provide a valid email address.',
                'email.max' => 'Your email may not be greater than 255 characters.',

                'phone_number.required' => 'Please provide your phone number.',
                'phone_number.digits' => 'Your phone number must be exactly 10 digits.',

                'house.required' => 'Please provide your address.',
                'house.string' => 'The address must be valid text.',
                'house.max' => 'Your address may not be greater than 255 characters.',

                'city.required' => 'Please provide your city.',
                'city.string' => 'The city must be valid text.',
                'city.max' => 'Your city name may not be greater than 100 characters.',

                'state_id.required' => 'Please select a state.',
                'state_id.exists' => 'The selected state is invalid.',

                'zipcode.required' => 'Please provide your zipcode.',
                'zipcode.digits' => 'The zipcode must be exactly 6 digits.',
            ]
        );

        $user = Auth::user();
        $sa = new ShippingAddress();
        $sa->user_id = $user->id;
        $sa->shipping_full_name = $request->name;
        $sa->shipping_email = $request->email;
        $sa->shipping_mobile_number = $request->phone_number;
        $sa->shipping_house = $request->house;
        $sa->shipping_city = $request->city;
        $sa->states_id = $request->state_id;
        $sa->shipping_zipcode = $request->zipcode;
        $sa->save();
        return redirect()->route('userShipping')->with('success', $shippingMessage);
    }
    public function getEditShippingAddress($id)
    {
        $sa = ShippingAddress::findOrFail($id);
        $state = States::where('id', $sa->state_id)->first();
        $states = States::orderBy('state_code', 'desc')->get();
        return view('userPersonal.editUserShipping', compact('sa', 'state', 'states'));
    }
    public function putEditUserShipping(Request $request, $id)
    {
        $sa = ShippingAddress::findOrFail($id);

        $shippingMessage = "Shipping Address Edit Successfully";

        $request->validate(
            [
                'name' => 'required|string|max:100',
                'email' => 'required|email|max:255',
                'phone_number' => 'required|digits:10',
                'house' => 'required|string|max:255',
                'city' => 'required|string|max:100',
                'state_id' => 'required|exists:states,id',
                'zipcode' => 'required|digits:6',
            ],
            [
                'name.required' => 'Please provide your full name.',
                'name.string' => 'The name must be a valid text.',
                'name.max' => 'Your name may not be greater than 100 characters.',

                'email.required' => 'Please provide your email address.',
                'email.email' => 'Please provide a valid email address.',
                'email.max' => 'Your email may not be greater than 255 characters.',

                'phone_number.required' => 'Please provide your phone number.',
                'phone_number.digits' => 'Your phone number must be exactly 10 digits.',

                'house.required' => 'Please provide your address.',
                'house.string' => 'The address must be valid text.',
                'house.max' => 'Your address may not be greater than 255 characters.',

                'city.required' => 'Please provide your city.',
                'city.string' => 'The city must be valid text.',
                'city.max' => 'Your city name may not be greater than 100 characters.',

                'state_id.required' => 'Please select a state.',
                'state_id.exists' => 'The selected state is invalid.',

                'zipcode.required' => 'Please provide your zipcode.',
                'zipcode.digits' => 'The zipcode must be exactly 6 digits.',
            ]
        );

        $user = Auth::user();
        $sa->user_id = $user->id;
        $sa->shipping_full_name = $request->name;
        $sa->shipping_email = $request->email;
        $sa->shipping_mobile_number = $request->phone_number;
        $sa->shipping_house = $request->house;
        $sa->shipping_city = $request->city;
        $sa->states_id = $request->state_id;
        $sa->shipping_zipcode = $request->zipcode;
        $sa->save();
        return redirect()->route('userShipping')->with('success', $shippingMessage);
    }
    public function deleteShippingAddress($id)
    {
        $shippingMessage = "Your Shipping Address Delete Successfully";
        $shippingAddressId = ShippingAddress::findOrFail($id);
        $shippingAddressId->delete();
        return redirect()->route('userShipping')->with('success', $shippingMessage);
    }
    public function userPayment()
    {
        $user = Auth::user();
        $p = Payment::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('userPersonal.payment', compact('p'));
    }
    public function getAddUserPayment()
    {
        return view('userPersonal.addUserPayment');
    }
    public function postAddUserPayment(Request $request)
    {
        $successMessage = "Payment Method added";

        $request->merge(['cno' => preg_replace('/\s+/', '', $request->cno)]);

        $request->validate([
            'con' => 'required|string|max:255',
            'cname' => 'required|string|max:255',
            'cno' => 'required|digits:16',
            'mm' => 'required|digits:2|numeric|min:01|max:12',
            'yy' => 'required|digits:2|numeric|min:00|max:99',
            'cvv' => 'required|digits:3|numeric',
        ], [
            'cno.required' => 'Card number is mandatory.',
            'con.required' => 'Card owner name is mandatory.',
            'cname.required' => 'Card Name is mandatory.',
            'mm.required' => 'Enter Proper Month.',
            'yy.required' => 'Enter Proper Year.',
            'cvv.required' => 'Enter CVV number.',
            'cno.digits' => 'Card number must be exactly 16 digits.',
            'mm.digits' => 'Expiration month must be 2 digits.',
            'yy.digits' => 'Expiration year must be 2 digits.',
            'cvv.digits' => 'CVV must be exactly 3 digits.',
            'mm.min' => 'Expiration month must be between 01 and 12.',
            'mm.max' => 'Expiration month must be between 01 and 12.',
            'yy.min' => 'Expiration year must be between 00 and 99.',
            'yy.max' => 'Expiration year must be between 00 and 99.',
            'cvv.numeric' => 'CVV must contain only numeric values.',
        ]);

        $user = Auth::user();
        $payment = new Payment();
        $payment->user_id = $user->id;
        $payment->card_owner_name = $request->con;
        $payment->card_name = $request->cname;
        $payment->card_number = $request->cno;
        $payment->mm = $request->mm;
        $payment->yy = $request->yy;
        $payment->cvv = $request->cvv;
        $payment->save();

        return redirect()->route('userPayment')->with('success', $successMessage);
    }

    public function deletePaymentAddress($id)
    {
        $paymentMessage = "Your payment Address Delete Successfully";
        $paymentId = Payment::findOrFail($id);
        $paymentId->delete();
        return redirect()->route('userPayment')->with('success', $paymentMessage);
    }

    public function changePassword()
    {

        $user = Auth::user();
        $next_change_at = $user->password_changed_at ? $user->password_changed_at->addDays(3) : null;
        return view('userPersonal.changeUserPassword', compact('user', 'next_change_at'));
    }

    public function postChangePassword(Request $request)
    {
        $v = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($v->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $v->errors(),
            ], 422);

        }

        $user = auth()->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json([
                'status' => false,
                'errors' => [
                    'old_password' => ['Please enter correct old password.']
                ]
            ], 422);
        }

        if (Hash::check($request->new_password, $user->password)) {
            return response()->json([
                'status' => false,
                'errors' => [
                    'new_password' => ["same as old password please use other"],
                ]
            ], 422);
        }

        if ($request->old_password === $request->new_password) {
            return response()->json([
                'status' => false,
                'errors' => [
                    'new_password' => ['The new password must be different from the current password.']
                ]
            ], 422);
        }

        $user->password = Hash::make($request->new_password);
        $user->password_changed_at = now();
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Password updated successfully.'
        ]);
    }
}