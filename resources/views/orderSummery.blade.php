<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<body class="bg-gray-50">
    @include('navbar')
    <div class="container mx-auto px-4 py-8  mt-16">

        <div
            class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 mb-10 shadow-2xl relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute w-72 h-72 bg-purple-300 rounded-full blur-3xl -top-20 -right-20 animate-pulse">
                </div>
                <div
                    class="absolute w-72 h-72 bg-blue-300 rounded-full blur-3xl -bottom-20 -left-20 animate-pulse delay-1000">
                </div>
            </div>

            <div class="relative z-10">
                <div class="flex flex-col lg:flex-row items-center gap-6 mb-10">
                    <div class="relative">
                        <video class="w-48 h-48 drop-shadow-2xl" autoplay loop muted playsinline>
                            <source src="{{ asset('Images/web-img/animation/orderConfirmed.mp4') }}" type="video/mp4">
                        </video>
                        <div class="absolute inset-0 bg-gradient-to-tr from-blue-200/20 to-purple-200/20 rounded-full">
                        </div>
                    </div>

                    <div class="flex-1 space-y-4">
                        <div class="flex mb-8 justify-between">
                            <h1
                                class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                Order Confirmed! & Order is #{{ $order->id }}
                            </h1>
                            <div
                                class="mx-10 inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/90 backdrop-blur-sm border border-gray-200/80 shadow-sm hover:shadow-md transition-all">
                                <div class="relative flex-shrink-0">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-r from-amber-400 to-orange-500 rounded-full animate-pulse opacity-20">
                                    </div>
                                    <svg class="w-6 h-6 text-amber-600" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor">
                                    </svg>
                                </div>
                                <span
                                    class="text-sm font-semibold bg-gradient-to-r from-amber-600 to-orange-600 bg-clip-text text-transparent">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>

                        <div class="space-y-2 flex justify-between">
                            <div class="flex items-start gap-4">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-800">Order Placed</h3>
                                    <p class="text-gray-500">{{ $order->created_at->format('d M, Y - h:i A') }}</p>
                                    <span
                                        class="text-sm text-blue-800 bg-blue-50 px-2 py-2 rounded-md mt-1 inline-block">
                                        Order place confirmed
                                    </span>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-800">Estimated Shipping</h3>
                                    <p class="text-gray-500">
                                        {{ \Carbon\Carbon::parse($order->shipped_date)->format('d M, Y h:i A') }}
                                    </p>
                                    <span
                                        class="text-sm text-blue-600 bg-blue-50 px-2 py-1 rounded-md mt-1 inline-block">Preparing
                                        for shipment</span>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center shrink-0">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-800">Estimated Delivery</h3>
                                    <p class="text-gray-500">
                                        {{ \Carbon\Carbon::parse($order->delivered_date)->format('d M, Y h:i A') }}
                                    </p>
                                    <span
                                        class="text-sm text-green-600 bg-green-50 px-2 py-1 rounded-md mt-1 inline-block">Expected
                                        in 3-5 business days</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="p-4 rounded-xl bg-white/50 backdrop-blur-sm border border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Estimated Delivery</p>
                            <p class="font-medium text-gray-800">7-12 Business Days</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-white/50 backdrop-blur-sm border border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 3v2m10-2v2M5.2 21h13.6a2 2 0 001.916-2.575l-1.441-4.313a2 2 0 00-1.933-1.312H5.658a2 2 0 00-1.933 1.312l-1.441 4.313A2 2 0 005.2 21z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Payment Method</p>
                            <p class="font-medium text-gray-800">{{ $order->payment->card_type ?? 'Credit Card' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-white/50 backdrop-blur-sm border border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-green-100 rounded-lg">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Order Protected</p>
                            <p class="font-medium text-gray-800">Buyer Protection</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="border-t border-gray-100/50 pt-6">
                <div class="flex items-center gap-3 animate-float">
                    <div class="p-2 bg-gradient-to-r from-blue-500 to-purple-500 rounded-lg shadow-lg">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <p class="text-gray-600">
                        Confirmation sent to <span class="font-medium text-blue-600">{{ $order->email }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 container">
        <div class="">
            <div class="bg-white rounded-xl shadow-lg border border-gray-500 overflow-hidden mb-5">
                <div class="bg-indigo-50 px-6 py-4 border-b border-indigo-100">
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <h2 class="text-lg font-semibold text-gray-800">Order Summary</h2>
                    </div>
                </div>

                <div class="border overflow-hidden">
                    <div class="hidden md:flex bg-gray-50 px-4 py-3 border-b">
                        <div class="w-2/5 text-sm font-medium text-gray-500">Product</div>
                        <div class="w-1/5 text-sm font-medium text-gray-500">Price</div>
                        <div class="w-1/5 text-sm font-medium text-gray-500">Quantity</div>
                        <div class="w-1/5 text-sm font-medium text-gray-500 text-right">Total</div>
                    </div>

                    <div class="divide-y">
                        @if ($orderItems->count() > 0)
                            @foreach ($orderItems as $item)
                                <div
                                    class="flex flex-col md:flex-row items-center gap-4 p-4 hover:bg-gray-50 transition-colors text-center">
                                    <img src="{{ asset('images/product_img/' . $item->product->productImage) }}"
                                        alt="Product" class="w-16 h-16 rounded-lg object-cover border">

                                    <div class="flex-1 w-full md:w-2/5">
                                        <h3 class="font-semibold text-sm text-gray-900"> {{ $item->name }} </h3>
                                    </div>
                                    <div class="w-full md:w-1/5">
                                        <span class="md:hidden text-sm text-gray-500">Price: </span>
                                        <span class="text-gray-900"> ₹ {{ $item->price }} </span>
                                    </div>

                                    <div class="w-full md:w-1/5">
                                        <span class="md:hidden text-sm text-gray-500">Quantity: </span>
                                        <span class="text-gray-900"> {{ $item->quantity }} </span>
                                    </div>

                                    <div class="w-full md:w-1/5 text-right">
                                        <span class="md:hidden text-sm text-gray-500">Total: </span>
                                        <span class="font-semibold text-green-700"> ₹ {{ $item->total }} </span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg border border-gray-500 overflow-hidden">
                <div class="bg-white rounded-lg shadow-xl">
                    <div class="bg-indigo-50 px-6 py-4 border-b border-indigo-100">
                        <div class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="28"
                                height="28" color="#4f46e5" fill="none">
                                <circle cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="1.5" />
                                <path d="M9.5 16L9.5 8" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" />
                                <path d="M11 8V6M13.5 8V6" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" />
                                <path d="M11 18V16M13.5 18V16" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" />
                                <path
                                    d="M9.5 12H14.5C15.3284 12 16 12.6716 16 13.5V14.5C16 15.3284 15.3284 16 14.5 16H8"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M8 8L14.5 8C15.3284 8 16 8.67157 16 9.5V10.5C16 11.3284 15.3284 12 14.5 12H9.5"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <h2 class="text-lg font-semibold text-gray-800">Cost & Pricing</h2>
                        </div>
                    </div>
                    <div class="space-y-2 p-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="text-gray-800">₹ {{ $order->subtotal }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping + Tax</span>
                            <span class="text-gray-800">₹ {{ $order->others_tax }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-green-600">Coupon Off</span>
                            <span class="text-green-800">₹ {{ $order->discount }}</span>
                        </div>
                        <div class="flex justify-between pt-4 border-t">
                            <span class="font-semibold text-gray-800">Total</span>
                            <span class="font-semibold text-gray-800">₹ {{ $order->total_amount }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div class="bg-white mb-5 rounded-xl shadow-lg border border-gray-500 overflow-hidden">
                <div class="bg-indigo-50 px-6 py-4 border-b border-indigo-100">
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                        <h2 class="text-lg font-semibold text-gray-800">Shipping Details</h2>
                    </div>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="space-y-1">
                                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Contact
                                        Information</h3>
                                    <p class="text-gray-900 font-medium">
                                        {{ $order->shipping_address->shipping_full_name }}</p>
                                    <p class="text-gray-600 text-sm">
                                        {{ $order->shipping_address->shipping_email }}
                                    </p>
                                    <p class="text-gray-600 text-sm">
                                        {{ $order->shipping_address->shipping_mobile_number }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div class="space-y-1">
                                    <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Shipping
                                        Address</h3>
                                    <p class="text-gray-600 text-sm">
                                        {{ $order->shipping_address->shipping_house }},<br>
                                        {{ $order->shipping_address->shipping_city }},<br>
                                        {{ optional($order->shipping_address->state)->state_name }} -
                                        {{ $order->shipping_address->shipping_zipcode }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-6 border-t border-gray-100"></div>

                    <div class="flex items-center gap-3">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Estimated Delivery</p>
                            <p class="text-sm text-gray-500">7-12 business days</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white mb-5 rounded-xl shadow-lg border border-gray-500 overflow-hidden">
                <div class="bg-indigo-50 px-6 py-4 border-b border-indigo-100">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            color="#5250b0" fill="none">
                            <path
                                d="M13.5 15H6C4.11438 15 3.17157 15 2.58579 14.4142C2 13.8284 2 12.8856 2 11V7C2 5.11438 2 4.17157 2.58579 3.58579C3.17157 3 4.11438 3 6 3H18C19.8856 3 20.8284 3 21.4142 3.58579C22 4.17157 22 5.11438 22 7V12C22 12.9319 22 13.3978 21.8478 13.7654C21.6448 14.2554 21.2554 14.6448 20.7654 14.8478C20.3978 15 19.9319 15 19 15"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M14 9C14 10.1045 13.1046 11 12 11C10.8954 11 10 10.1045 10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M13 17C13 15.3431 14.3431 14 16 14V12C16 10.3431 17.3431 9 19 9V14.5C19 16.8346 19 18.0019 18.5277 18.8856C18.1548 19.5833 17.5833 20.1548 16.8856 20.5277C16.0019 21 14.8346 21 12.5 21H12C10.1362 21 9.20435 21 8.46927 20.6955C7.48915 20.2895 6.71046 19.5108 6.30448 18.5307C6 17.7956 6 16.8638 6 15"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <h2 class="text-lg font-semibold text-gray-800">Payment Details</h2>
                    </div>
                </div>

                @if ($order->payments != null)
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4 col-span-2">
                                <div class="flex items-start gap-3">
                                    <div class="space-y-1 w-full">
                                        <div class="bg-gray-100 rounded-lg p-4">
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="font-medium text-gray-900">
                                                    {{ strtoupper($order->payments->card_name) }}
                                                </span>
                                                <div class="flex items-center gap-2">
                                                    <div
                                                        class="bg-indigo-600 text-white px-2 py-1 rounded text-xs font-medium">
                                                        @if (str_starts_with($order->payments->card_number, '4'))
                                                            VISA
                                                        @elseif(str_starts_with($order->payments->card_number, '5'))
                                                            MASTERCARD
                                                        @else
                                                            CARD
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex items-center gap-2 my-5">
                                                <div class="flex space-x-1">
                                                    <span class="w-3 h-3 rounded-full bg-gray-300"></span>
                                                    <span class="w-3 h-3 rounded-full bg-gray-300"></span>
                                                    <span class="w-3 h-3 rounded-full bg-gray-300"></span>
                                                    <span class="w-3 h-3 rounded-full bg-gray-300"></span>
                                                </div>
                                                <span class="font-mono text-gray-700">
                                                    **** **** **** {{ substr($order->payments->card_number, -4) }}
                                                </span>
                                            </div>

                                            <div class="flex justify-between text-sm mt-10">
                                                <div>
                                                    <span class="text-gray-500">Expires</span>
                                                    <span class="text-gray-700 ml-1">
                                                        {{ str_pad($order->payments->mm, 2, '0', STR_PAD_LEFT) }}/{{ $order->payments->yy }}
                                                    </span>
                                                </div>
                                                <div>
                                                    <span class="text-gray-500">CVV</span>
                                                    <span class="text-gray-700 ml-1">
                                                        {{ $order->payments->cvv }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="my-6 border-t border-gray-100"></div>

                        <div class="flex justify-center items-center gap-3">
                            <div class="flex items-center gap-2 mt-3 text-green-600 text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <span>Secure payment processed</span>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4 col-span-2">
                                <div class="flex items-start gap-3">
                                    <div class="space-y-1 w-full">
                                        <div class="bg-gray-100 rounded-lg p-4 text-center">
                                            <div class="flex items-center justify-center mb-2 gap-2">
                                                <span class="font-medium text-gray-900 text-lg">Cash on
                                                    Delivery</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    width="24" height="24" class="text-green-600">
                                                    <path fill="currentColor"
                                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                </svg>
                                            </div>
                                            <p class="text-gray-700 text-sm">You have chosen to pay with cash
                                                upon delivery.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-6 border-t border-gray-100"></div>
                        <div class="flex justify-center items-center gap-3">
                            <div class="flex items-center gap-2 mt-3 text-green-600 text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <span>Secure cash payment on delivery</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-6 text-center text-gray-600 text-sm">
        <p>Need help? Contact our <a href="#" class="text-blue-600 hover:underline">support team</a></p>
        <p class="mt-2">Order confirmation will be sent to your email</p>
    </div>
    </div>
</body>

</html>
