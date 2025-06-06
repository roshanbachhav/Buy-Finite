<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<style>
    @media only screen and (max-width: 600px) {
        .order-item {
            display: block;
            margin-bottom: 20px;
        }

        .order-item-price {
            text-align: left;
        }
    }
</style>

<body style="background-color: #f5f7fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6;">
    <div style="max-width: 680px; margin: 2rem auto; padding: 2rem 0;">
        <div
            style="background: #ffffff; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); border: 1px solid #e0e7ff;">

            <div
                style="padding: 2rem; background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); border-radius: 12px 12px 0 0; text-align: center;">
                <h1 style="color: white; font-size: 28px; font-weight: 700; margin: 0 0 8px 0;">
                    {{ $orders['userType'] == 'customer' ? '🎉 Order Confirmation' : '📦 Order Received' }}
                </h1>
                <p style="color: rgba(255,255,255,0.9); font-size: 16px; margin: 0;">
                    Order ID: #{{ $orders['order']->id }}
                </p>
            </div>

            <div style="padding: 2rem;">
                <div style="margin-bottom: 2rem;">
                    <h2
                        style="font-size: 20px; color: #1f2937; margin: 0 0 1.5rem 0; padding-bottom: 0.75rem; border-bottom: 2px solid #e5e7eb; position: relative;">
                        📋 Order Items
                    </h2>
                    <div style="margin-top: 1rem;">
                        @foreach ($orders['order']->orderItems as $item)
                            <div
                                style="display: flex; align-items: center; padding: 1rem; background: #f8f9fc; border-radius: 8px; margin-bottom: 12px;">
                                <div style="flex: 1;">
                                    <h3 style="font-size: 16px; color: #111827; margin: 0 0 4px 0; font-weight: 600;">
                                        {{ $item->name }}
                                    </h3>
                                    <p style="color: #6b7280; font-size: 14px; margin: 0;">
                                        Quantity: {{ $item->quantity }}
                                    </p>
                                </div>
                                <div style="text-align: right;">
                                    <p style="color: #111827; font-weight: 600; margin: 0 0 4px 0;">
                                        ₹{{ number_format($item->price, 2) }}
                                    </p>
                                    <p style="color: #6b7280; font-size: 14px; margin: 0;">
                                        Total: ₹{{ number_format($item->price * $item->quantity, 2) }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
                    <!-- Shipping Details -->
                    <div style="padding: 1.5rem; background: #f8fafc; border-radius: 8px; border: 1px solid #e0e7ff;">
                        <h2
                            style="font-size: 18px; color: #111827; margin: 0 0 1rem 0; display: flex; align-items: center; gap: 8px;">
                            📮 Shipping Details
                        </h2>
                        <div style="font-size: 14px; color: #4b5563;">
                            <p style="margin: 0 0 8px 0;"><strong>Name:</strong> {{ $orders['order']->full_name }}</p>
                            <p style="margin: 0 0 8px 0;"><strong>Email:</strong> {{ $orders['order']->email }}</p>
                            <p style="margin: 0 0 8px 0;"><strong>Phone:</strong> {{ $orders['order']->mobile_number }}
                            </p>
                            <p style="margin: 0 0 8px 0;"><strong>Address:</strong> {{ $orders['order']->house }},
                                {{ $orders['order']->city }}</p>
                            <p style="margin: 0 0 8px 0;"><strong>State:</strong>
                                {{ $orders['order']->state->state_name }}</p>
                            <p style="margin: 0;"><strong>ZIP:</strong> {{ $orders['order']->zipcode }}</p>
                        </div>
                    </div>

                    <div style="padding: 1.5rem; background: #f8fafc; border-radius: 8px; border: 1px solid #e0e7ff;">
                        <h2
                            style="font-size: 18px; color: #111827; margin: 0 0 1rem 0; display: flex; align-items: center; gap: 8px;">
                            💰 Order Summary
                        </h2>
                        <div style="font-size: 14px; color: #4b5563;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 12px;">
                                <span>Subtotal:</span>
                                <span>₹{{ number_format($orders['order']->subtotal, 2) }}</span>
                            </div>
                            @if ($orders['order']->discount)
                                <div
                                    style="display: flex; justify-content: space-between; margin-bottom: 12px; color: #10b981;">
                                    <span>Discount ({{ $orders['order']->coupons->code ?? 'NA' }}):</span>
                                    <span>-₹{{ number_format($orders['order']->discount, 2) }}</span>
                                </div>
                            @endif
                            <div style="display: flex; justify-content: space-between; margin-bottom: 12px;">
                                <span>Tax:</span>
                                <span>₹{{ number_format($orders['order']->others_tax, 2) }}</span>
                            </div>
                            <div
                                style="display: flex; justify-content: space-between; padding-top: 12px; border-top: 2px solid #e5e7eb; font-weight: 600; color: #111827;">
                                <span>Total:</span>
                                <span>₹{{ number_format($orders['order']->total_amount, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="padding: 1.5rem; background: #f0f9ff; border-radius: 8px; border: 1px solid #bae6fd;">
                    <h2
                        style="font-size: 18px; color: #111827; margin: 0 0 1rem 0; display: flex; align-items: center; gap: 8px;">
                        📅 Order Timeline
                    </h2>
                    <div style="font-size: 14px; color: #4b5563;">
                        <div
                            style="display: flex; justify-content: space-between; margin-bottom: 12px; padding: 8px 0;">
                            <span>Order Placed</span>
                            <span
                                style="font-weight: 500; color: #111827;">{{ $orders['order']->created_at->format('M d, Y') }}</span>
                        </div>
                        <div
                            style="display: flex; justify-content: space-between; margin-bottom: 12px; padding: 8px 0;">
                            <span>Estimated Shipping</span>
                            <span
                                style="font-weight: 500; color: #111827;">{{ $orders['order']->created_at->addDays(2)->format('M d, Y') }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; padding: 8px 0;">
                            <span>Estimated Delivery</span>
                            <span
                                style="font-weight: 500; color: #111827;">{{ $orders['order']->created_at->addDays(5)->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div
                style="padding: 2rem; background: #f8fafc; border-radius: 0 0 12px 12px; border-top: 1px solid #e0e7ff; text-align: center;">
                <p style="color: #6b7280; font-size: 14px; margin: 0 0 8px 0;">
                    Need help? Contact us at <a href="mailto:support@example.com"
                        style="color: #6366f1; text-decoration: none;">bachhavroshan600@gmail.com</a>
                </p>
                <p style="color: #6b7280; font-size: 12px; margin: 0;">
                    © 2024 Your Brand. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</body>

</html>
