<?php

use App\Mail\OrderMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

function orderMail($id, $userType)
{
    $order = Order::where('id', $id)->with('orderItems')->first();
    if ($userType == "customer") {
        $subject = "Thank You for purchesing the order";
        $email = $order->email;
    } else {
        $subject = "Send Order details on your email.";
        $email = env('ADMIN_MAIL', 'projecttybsc35@gmail.com');
    }
    $orders = [
        'subject' => $subject,
        'order' => $order,
        'userType' => $userType,
    ];

    Mail::to($email)->send(new OrderMail($orders));
}