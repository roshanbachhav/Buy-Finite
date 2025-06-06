<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderData;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class OrderController extends Controller
{
    public function showOrderList()
    {
        $orders = Order::latest('orders.created_at')
            ->leftJoin('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'users.name', 'users.email')
            ->paginate(5);


        return view('admin.orders.orderList', compact('orders'));
    }

    public function show($id)
    {
        $orders = Order::where('orders.id', $id)
            ->leftJoin('users', 'users.id', '=', 'orders.user_id')
            ->select('orders.*', 'users.name', 'users.email')
            ->first();
        $orderData = OrderData::where('order_id', $id)->with('product')->get();
        $location = " " . $orders->house . ", " . $orders->city . ", " . $orders->zipcode . ", " . $orders->state->state_name;

        return view('admin.orders.orderDetails', compact('orders', 'location', 'orderData'));
    }

    public function updateStatusByAdmin(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->shipped_date = $request->shippedDT;
        $order->delivered_date = $request->deliveredDT;
        $order->save();

        return response()->json([
            'status' => true,
            'message' => 'Status Updated Successfully'
        ]);
    }

    public function adminMailSender(Request $request, $id)
    {
        orderMail($id, $request->invoice_email);

        return response()->json([
            'status' => true,
            'message' => "Email Send Successfully"
        ]);
    }

    public function deleteMultipleOrders(Request $request)
    {
        $ids = $request->ids;
        if (!empty($ids)) {
            Order::whereIn('id', $ids)->delete();

            return response()->json([
                'status' => true,
                'message' => 'Selected orders deleted successfully.',
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'No order IDs provided.'
        ], 400);
    }
}