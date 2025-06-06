<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<body>
    @include('navbar')
    @include('layouts.profile')
    <div class="mt-16">
        <div class="p-4 sm:ml-64 mt-15">
            <div class="p-4">
                <div class="bg-white shadow-2xl rounded-2xl p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                        <div class="bg-gradient-to-r from-blue-50 to-purple-50 p-6 rounded-xl animate-fade-in">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">Order Details</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <p class="text-gray-600">Order Id</p>
                                    <p class="text-lg font-semibold text-gray-800">#{{ $orders->id }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Total Amount</p>
                                    <p class="text-lg font-semibold text-gray-800">₹
                                        {{ number_format($orders->total_amount, 2) }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Shipped Date</p>
                                    <p class="text-lg font-semibold text-gray-800">
                                        {{ \Carbon\Carbon::parse($orders->shipped_date)->format('d M, Y h:i A') }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Delivered Date</p>
                                    <p class="text-lg font-semibold text-gray-800">
                                        {{ \Carbon\Carbon::parse($orders->delivered_date)->format('d M, Y h:i A') }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Status</p>
                                    <p class="text-lg font-semibold text-green-600">{{ $orders->status }}</p>
                                </div>
                            </div>
                            <div class="gap-6 mt-8">
                                <div>
                                    <p class="text-gray-600">Location</p>
                                    <p class="text-lg font-semibold">
                                    <address> {{ $location }} </address>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Order Pricing -->
                        <div class="bg-gradient-to-r from-green-50 to-teal-50 p-6 rounded-xl animate-fade-in">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">Order Pricing</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <p class="text-gray-600">SubTotal</p>
                                    <p class="text-lg font-semibold text-gray-800">₹ {{ $orders->subtotal }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Tax + Packaging</p>
                                    <p class="text-lg font-semibold text-gray-800">₹ {{ $orders->others_tax }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Promo Code</p>
                                    <p class="text-lg font-semibold text-gray-800 animate-pulse uppercase">
                                        {{ $orders->coupons->code ?? 'No Promo Code Applied' }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Discount</p>
                                    <p class="text-lg font-semibold text-gray-800">
                                        ₹ {{ number_format($orders->discount, 2) }}
                                    </p>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-gray-600">Total</p>
                                    <p class="text-lg font-semibold text-green-600 animate-bounce">
                                        ₹ {{ number_format($orders->total_amount, 2) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="border-t pt-6">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Order Items - {{ $orderCounts }}</h3>
                        <div class="space-y-4">
                            @foreach ($orderData as $od)
                                <div
                                    class="flex items-center justify-between p-6 bg-gradient-to-r from-indigo-50 to-green-50 rounded-xl hover:shadow-md transition-shadow transform hover:scale-105 duration-300">
                                    <div class="flex items-center">
                                        <img src="{{ asset('images/product_img/' . $od->product->productImage) }}"
                                            alt="Product Image" class="w-16 h-16 rounded-lg">
                                        <div class="ml-4">
                                            <p class="font-semibold text-gray-800">{{ $od->name }} *
                                                {{ $od->quantity }}</p>
                                            <p class="text-sm text-gray-500">₹ {{ number_format($od->price, 2) }}</p>
                                        </div>
                                    </div>
                                    <p class="text-lg font-semibold text-gray-800">₹ {{ number_format($od->total, 2) }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
