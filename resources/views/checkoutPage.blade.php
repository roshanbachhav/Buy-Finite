<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<body>
    @include('navbar')
    <div class="max-w-7xl mx-auto p-8 rounded-lg mt-10">

        <div id="toast-container" class="fixed top-5 right-5 z-50 space-y-3 w-80">
            <div class="toast-template hidden">
                <div
                    class="flex items-start p-4 rounded-lg shadow-lg border-l-4 transform transition-all duration-300 translate-x-full">
                    <div class="toast-icon flex-shrink-0 w-6 h-6 mt-0.5"></div>
                    <div class="ml-3 flex-1">
                        <p class="text-sm font-medium toast-message"></p>
                    </div>
                    <button class="ml-4 close-btn opacity-70 hover:opacity-100 transition-opacity">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <form action="{{ route('postCheckout') }}" method="post">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-3">
                <div class="p-5 border-r border-gray-200">
                    <div class="mb-6 p-3">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">Cart Products</h2>
                        <nav aria-label="Breadcrumb">
                            <ol class="flex items-center gap-1 text-sm text-gray-600">
                                <li>
                                    <a href="{{ route('home') }}" class="block transition hover:text-gray-700">
                                        <span class="sr-only"> Home </span>

                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                    </a>
                                </li>

                                <li class="rtl:rotate-180">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </li>

                                <li>
                                    <a href="{{ route('productsPage') }}" class="block transition hover:text-gray-700">
                                        products
                                    </a>
                                </li>

                                <li class="rtl:rotate-180">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </li>

                                <li>
                                    <a href="{{ route('cartPage') }}" class="block transition hover:text-gray-700">
                                        cart
                                    </a>
                                </li>

                                <li class="rtl:rotate-180">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </li>

                                <li>
                                    <span class="block transition hover:text-gray-700 text-xs">
                                        Checkout
                                    </span>
                                </li>

                            </ol>
                        </nav>
                    </div>
                    <div class="space-y-4 p-3 rounded-lg shadow-lg border-gray-600">
                        @foreach ($cartData as $items)
                            <div
                                class="flex items-center justify-between pb-4 p-4 rounded-lg hover:shadow-lg transition-shadow duration-300 ease-in-out">
                                <div class="flex items-center gap-4">
                                    <img src="{{ asset('images/product_img/' . $items->options->productImage) }}"
                                        alt="Product" class="w-14 h-14 rounded-md shadow-lg">
                                    <div>
                                        <h3 class="text-sm font-medium">{{ $items->name }}</h3>
                                        <p class="text-gray-600 text-xs">Quantity: {{ $items->qty }}</p>
                                        <p class="text-gray-600 text-xs">₹ {{ $items->price }}</p>
                                    </div>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    onclick="deleteItemsInCart('{{ $items->rowId }}');"
                                    class="w-5 h-5 text-gray-600 cursor-pointer hover:text-red-500 transition">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </div>
                        @endforeach
                    </div>
                    <fieldset class="space-y-4 p-3 my-5 rounded-lg shadow-lg">
                        <legend class="sr-only">Delivery</legend>
                        <div>
                            <label for="onlinePayment"
                                class="flex cursor-pointer items-center justify-between gap-4 rounded-lg border border-gray-100 bg-white p-4 text-sm font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                                <p class="text-gray-700">Online Payment Method</p>

                                <p class="text-gray-900"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        width="24" height="24" color="#e203ff" fill="none">
                                        <path d="M2 4.5H8.75736C9.55301 4.5 10.3161 4.81607 10.8787 5.37868L14 8.5"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M5 13.5H2" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M8.5 7.5L10.5 9.5C11.0523 10.0523 11.0523 10.9477 10.5 11.5C9.94772 12.0523 9.05229 12.0523 8.5 11.5L7 10C6.13931 10.8607 4.77671 10.9575 3.80294 10.2272L3.5 10"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M5 11V15.5C5 17.3856 5 18.3284 5.58579 18.9142C6.17157 19.5 7.11438 19.5 9 19.5H18C19.8856 19.5 20.8284 19.5 21.4142 18.9142C22 18.3284 22 17.3856 22 15.5V12.5C22 10.6144 22 9.67157 21.4142 9.08579C20.8284 8.5 19.8856 8.5 18 8.5H9.5"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M15.25 14C15.25 14.9665 14.4665 15.75 13.5 15.75C12.5335 15.75 11.75 14.9665 11.75 14C11.75 13.0335 12.5335 12.25 13.5 12.25C14.4665 12.25 15.25 13.0335 15.25 14Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg></p>

                                <input type="radio" name="DeliveryOption" value="onlinePayment" id="onlinePayment"
                                    class="sr-only" checked />
                            </label>
                        </div>
                        <div>
                            <label for="COD"
                                class="flex cursor-pointer items-center justify-between gap-4 rounded-lg border border-gray-100 bg-white p-4 text-sm font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                                <p class="text-gray-700">Cash On Delivery - COD</p>

                                <p class="text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                        height="24" color="#e203ff" fill="none">
                                        <path
                                            d="M4 14H6.39482C6.68897 14 6.97908 14.0663 7.24217 14.1936L9.28415 15.1816C9.54724 15.3089 9.83735 15.3751 10.1315 15.3751H11.1741C12.1825 15.3751 13 16.1662 13 17.142C13 17.1814 12.973 17.2161 12.9338 17.2269L10.3929 17.9295C9.93707 18.0555 9.449 18.0116 9.025 17.8064L6.84211 16.7503"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M13 16.5L17.5928 15.0889C18.407 14.8352 19.2871 15.136 19.7971 15.8423C20.1659 16.3529 20.0157 17.0842 19.4785 17.3942L11.9629 21.7305C11.4849 22.0063 10.9209 22.0736 10.3952 21.9176L4 20.0199"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M15 12H13C11.1144 12 10.1716 12 9.58579 11.4142C9 10.8284 9 9.88562 9 8V6C9 4.11438 9 3.17157 9.58579 2.58579C10.1716 2 11.1144 2 13 2H15C16.8856 2 17.8284 2 18.4142 2.58579C19 3.17157 19 4.11438 19 6V8C19 9.88562 19 10.8284 18.4142 11.4142C17.8284 12 16.8856 12 15 12Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M13 5H15" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </p>

                                <input type="radio" name="DeliveryOption" value="COD" id="COD"
                                    class="sr-only" />
                            </label>
                        </div>

                    </fieldset>
                    <div class="shadow-lg p-3 rounded-lg">
                        <div class="relative my-6">
                            <div class="">
                                <input type="text" id="coupon_code" placeholder="Enter coupon code"
                                    class="uppercase w-full border border-gray-300 rounded-md py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
                                <button type="button" id="coupon_applyer"
                                    class="absolute right-4 top-4 -translate-y-1/2 text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14"
                                        height="14" class="flex items-center" color="#000000" fill="none">
                                        <path
                                            d="M12 22C16.4183 22 20 18.4183 20 14C20 8 12 2 12 2C11.6117 4.48692 11.2315 5.82158 10 8C8.79908 7.4449 8.5 7 8 5.75C6 8 4 11 4 14C4 18.4183 7.58172 22 12 22Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                        <path d="M10 17L14 13" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M10 13H10.009M13.991 17H14" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                            <div class="mt-2">
                                @if (Session::has('code'))
                                    <div class="flex justify-start">
                                        <span
                                            class="inline-flex items-center justify-center rounded-full bg-indigo-100 px-2.5 py-0.5 text-indigo-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="-ms-1 me-1.5 size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                                            </svg>

                                            <p class="whitespace-nowrap text-xs">{{ Session::get('code') }}</p>
                                            <a href="" id="remove-coupon">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    width="14" height="14" color="#FF2400" fill="none"
                                                    class="ml-2">
                                                    <path
                                                        d="M19.0005 4.99988L5.00049 18.9999M5.00049 4.99988L19.0005 18.9999"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>


                        <div class="space-y-2 text-gray-700">
                            <div class="flex justify-between">
                                <span class="text-base">Subtotal:</span>
                                <span class="text-base">₹ {{ Cart::subtotal() }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-base">Shipping + Tax:</span>
                                <span>₹ {{ Cart::Tax() }}</span>
                            </div>
                            <div class="flex justify-between text-green-600">
                                <span class="text-base">Discount:</span>
                                <span id="discount-display">
                                    @if ($discount > 0)
                                        - ₹{{ number_format($discount, 2) }}
                                    @else
                                        NA
                                    @endif
                                </span>
                            </div>
                            <div class="border-t pt-2 flex justify-between font-semibold text-lg">
                                <span>Total:</span>
                                <span>₹ <span id="showTotalAmount">{{ number_format($total, 2) }}</span></span>
                            </div>
                        </div>
                        {{-- <button class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 transition">
                        Proceed to Checkout
                    </button> --}}
                    </div>
                </div>

                <div>
                    <div class="shadow-lg p-3 rounded-lg">
                        <div class="flex justify-between">
                            <h2 class="text-xl font-semibold text-gray-800 mb-6">Shipping Information</h2>
                            <div>
                                @if ($shippingAddresses->isNotEmpty())
                                    <select name="selected_shipping_address_id" id="shipping_addresses"
                                        class="w-full border border-gray-300 rounded-md py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
                                        <option value="">Select Shipping Address</option>
                                        @foreach ($shippingAddresses as $address)
                                            <option value="{{ $address->id }}"
                                                data-fullname="{{ $address->shipping_full_name }}"
                                                data-email="{{ $address->shipping_email }}"
                                                data-mobile="{{ $address->shipping_mobile_number }}"
                                                data-house="{{ $address->shipping_house }}"
                                                data-city="{{ $address->shipping_city }}"
                                                data-state="{{ $address->state->state_name }}"
                                                data-zipcode="{{ $address->shipping_zipcode }}">
                                                {{ $address->shipping_full_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs text-gray-700 font-medium mb-1">Full Name</label>
                                <input type="text" placeholder="Enter your full name" name="shipping_full_name"
                                    value="{{ old('shipping_full_name') }}"
                                    class="w-full border border-gray-300 rounded-md py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none @error('shipping_full_name') border-red-500 @enderror">
                                <p class="text-red-500 text-xs mt-1"></p>
                            </div>

                            <div>
                                <label class="block text-xs text-gray-700 font-medium mb-1">Email</label>
                                <input type="email" placeholder="Enter Your correct Email Address"
                                    name="shipping_email" value="{{ old('shipping_email') }}"
                                    class="w-full border border-gray-300 rounded-md py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none @error('shipping_email') border-red-500 @enderror">
                                <p class="text-red-500 text-xs mt-1"></p>
                            </div>

                            <div>
                                <label class="block text-xs text-gray-700 font-medium mb-1">Phone Number</label>
                                <input type="text" placeholder="Enter Your Mobile Number"
                                    name="shipping_mobile_number" value="{{ old('shipping_mobile_number') }}"
                                    class="w-full border border-gray-300 rounded-md py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none @error('shipping_mobile_number') border-red-500 @enderror">
                                <p class="text-red-500 text-xs mt-1"></p>
                            </div>

                            <div>
                                <label class="block text-xs text-gray-700 font-medium mb-1">
                                    Apartment No. & Street
                                </label>
                                <input type="text" placeholder="Enter Your Apt No. - Street" name="shipping_house"
                                    value="{{ old('shipping_house') }}"
                                    class="w-full border border-gray-300 rounded-md py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none @error('shipping_house') border-red-500 @enderror">
                                <p class="text-red-500 text-xs mt-1"></p>
                            </div>

                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-xs text-gray-700 font-medium mb-1">City</label>
                                    <input type="text" placeholder="City Name" name="shipping_city"
                                        value="{{ old('shipping_city') }}"
                                        class="w-full border border-gray-300 rounded-md py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none @error('shipping_city') border-red-500 @enderror">
                                    <p class="text-red-500 text-xs mt-1"></p>
                                </div>

                                <div>
                                    <label class="block text-xs text-gray-700 font-medium mb-1">State</label>
                                    {{-- <input type="text" placeholder="State Name"
                                        class="w-full border border-gray-300 rounded-md py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none"> --}}
                                    <select name="shipping_state" id="shipping_state"
                                        class="w-full border border-gray-300 rounded-md py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none @error('shipping_state') border-red-500 @enderror">
                                        <option value="">Select State</option>
                                        @foreach ($states as $s)
                                            <option value="{{ $s->state_code }}">{{ $s->state_name }}</option>
                                        @endforeach
                                        <p class="text-red-500 text-xs mt-1"></p>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-xs text-gray-700 font-medium mb-1">Zip Code</label>
                                    <input type="text" name="shipping_zipcode" placeholder="Zipcode - 12345"
                                        value="{{ old('shipping_zipcode') }}"
                                        class="w-full border border-gray-300 rounded-md py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none @error('shipping_zipcode') border-red-500 @enderror">
                                    <p class="text-red-500 text-xs mt-1"></p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="paymentMethodSection shadow-lg mt-6 p-3 rounded-xl">
                        <div class="flex justify-between">
                            <h3 class="text-lg font-semibold text-gray-800 mt-4 mb-4">Payment Details</h3>
                            <div>
                                @if ($paymentDetails->isNotEmpty())
                                    <select name="payment_id" id="payment_details"
                                        class="w-full border border-gray-300 rounded-md py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
                                        <option value="">Select Payment Card</option>
                                        @foreach ($paymentDetails as $p)
                                            <option value="{{ $p->id }}" data-con="{{ $p->card_owner_name }}"
                                                data-card_name="{{ $p->card_name }}"
                                                data-card_number="{{ $p->card_number }}"
                                                data-mm="{{ $p->mm }}" data-yy="{{ $p->yy }}"
                                                data-cvv="{{ $p->cvv }}">
                                                {{ $p->card_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs text-gray-700 font-medium mb-1">Card Owner Name</label>
                                <input type="text" name="card_owner_name" placeholder="Enter Card Owner Name"
                                    value="{{ old('card_owner_name') }}"
                                    class="w-full border border-gray-300 rounded-md py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none @error('card_owner_name') border-red-500 @enderror">
                                <p class="text-red-500 text-xs mt-1"></p>
                            </div>
                            <div>
                                <label class="block text-xs text-gray-700 font-medium mb-1">Card Name</label>
                                <input type="text" name="card_name" placeholder="Enter Correct Card Name"
                                    value="{{ old('card_name') }}"
                                    class="w-full border border-gray-300 rounded-md py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none @error('card_name') border-red-500 @enderror">
                                <p class="text-red-500 text-xs mt-1"></p>
                            </div>
                            <div>
                                <label class="block text-xs text-gray-700 font-medium mb-1">Card Number</label>
                                <input type="text" name="card_number" placeholder="Enter Card Number"
                                    value="{{ old('card_number') }}"
                                    class="w-full border border-gray-300 rounded-md py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none @error('card_number') border-red-500 @enderror">
                                <p class="text-red-500 text-xs mt-1"></p>
                            </div>

                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-xs text-gray-700 font-medium mb-1">Exp. MM</label>
                                    <input type="text" name="mm" placeholder="Enter Card MM"
                                        value="{{ old('mm') }}"
                                        class="w-full border border-gray-300 rounded-md py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none @error('mm') border-red-500 @enderror">
                                    <p class="text-red-500 text-xs mt-1"></p>
                                </div>

                                <div>
                                    <label class="block text-xs text-gray-700 font-medium mb-1">Exp. YY</label>
                                    <input type="text" name="yy" placeholder="Enter Card YY"
                                        value="{{ old('yy') }}"
                                        class="w-full border border-gray-300 rounded-md py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none @error('yy') border-red-500 @enderror">
                                    <p class="text-red-500 text-xs mt-1"></p>
                                </div>

                                <div>
                                    <label class="block text-xs text-gray-700 font-medium mb-1">CVV</label>
                                    <input type="text" name="cvv" placeholder="Enter Card CVV"
                                        value="{{ old('cvv') }}"
                                        class="w-full border border-gray-300 rounded-md py-2 px-3 text-xs focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 outline-none @error('cvv') border-red-500 @enderror">
                                    <p class="text-red-500 text-xs mt-1"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white py-3 rounded-lg mt-6 hover:bg-green-700 transition">
                Place Order
            </button>
        </form>
    </div>

    <script>
        document.querySelector('input[name="shipping_mobile_number"]').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            value = value.replace(/(.{5})(?=.)/g, '$1 ');
            if (value.length > 11) {
                value = value.slice(0, 11);
            }
            e.target.value = value;
        });
        document.querySelector('input[name="shipping_zipcode"]').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 6) {
                value = value.slice(0, 6);
            }
            e.target.value = value;
        });
        document.querySelector('input[name="card_number"]').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            value = value.replace(/(.{4})(?=.)/g, '$1 ');
            if (value.length > 19) {
                value = value.slice(0, 19);
            }
            e.target.value = value;
        });
        document.querySelector('input[name="mm"]').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (parseInt(value) > 12) {
                value = '12';
            }
            if (value.length > 2) {
                value = value.slice(0, 2);
            }
            e.target.value = value;
        });
        document.querySelector('input[name="yy"]').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 2) {
                value = value.slice(0, 2);
            }
            e.target.value = value;
        });
        document.querySelector('input[name="cvv"]').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 3) {
                value = value.slice(0, 3);
            }
            e.target.value = value;
        });


        $('#coupon_applyer').click(function() {
            $.ajax({
                url: "{{ route('applyCoupon') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    code: $('#coupon_code').val()
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        $('#discount-display').html('-₹' + response.discount);
                        $('#showTotalAmount').html(response.total);
                        showToast(response.message, 'success');
                        setTimeout(() => location.reload(), 3000);
                    } else {
                        showToast(response.message, 'error');
                    }
                },
                error: function(xhr) {
                    showToast('Error: ' + xhr.responseJSON.message, 'error');
                }
            });
        });

        $('#remove-coupon').click(function() {
            $.ajax({
                url: "{{ route('removeCoupon') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {},
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        $('#discount-display').html('-₹' + response.discount);
                        showToast(response.message, 'success');
                        setTimeout(() => location.reload(), 3000);
                    } else {
                        showToast(response.message, 'error');
                    }
                },
                error: function(xhr) {
                    showToast('Error: ' + xhr.responseJSON.message, 'error');
                }
            });
        });

        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const template = container.querySelector('.toast-template');
            const newToast = template.cloneNode(true);

            newToast.classList.remove('toast-template', 'hidden');

            const colors = {
                success: {
                    bg: 'bg-green-50',
                    border: 'border-green-500',
                    icon: `<svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                   </svg>`
                },
                error: {
                    bg: 'bg-red-50',
                    border: 'border-red-500',
                    icon: `<svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                   </svg>`
                }
            };

            const toastBody = newToast.querySelector('div');
            toastBody.classList.add(colors[type].bg, colors[type].border);
            newToast.querySelector('.toast-icon').innerHTML = colors[type].icon;
            newToast.querySelector('.toast-message').textContent = message;

            newToast.querySelector('.close-btn').addEventListener('click', () => {
                toastBody.classList.add('translate-x-full', 'opacity-0');
                setTimeout(() => newToast.remove(), 300);
            });

            container.appendChild(newToast);

            setTimeout(() => {
                toastBody.classList.remove('translate-x-full');
                toastBody.classList.add('translate-x-0');
            }, 10);

            setTimeout(() => {
                toastBody.classList.add('translate-x-full', 'opacity-0');
                setTimeout(() => newToast.remove(), 300);
            }, 5000);
        }

        function deleteItemsInCart(rowId) {
            Swal.fire({
                title: "Are you sure?",
                text: "If you click yes then item delete permenant!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#7e22ce",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('deleteCartItem') }}',
                        type: 'post',
                        data: {
                            rowId: rowId,
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == true) {
                                window.location.href = "{{ route('checkout') }}";
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your item has been deleted.",
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            }
                        },
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                "content"),
                        },
                    });
                }
            });

        }

        $(document).ready(function() {
            $('input[name="DeliveryOption"]').change(function() {
                if ($(this).val() === 'COD') {
                    $('.paymentMethodSection').hide();
                } else {
                    $('.paymentMethodSection').show();
                }
            });
        });

        document.getElementById('shipping_addresses').addEventListener('change', function() {
            let selectedOption = this.options[this.selectedIndex];

            document.querySelector('input[name="shipping_full_name"]').value = selectedOption.dataset.fullname ||
                '';
            document.querySelector('input[name="shipping_email"]').value = selectedOption.dataset.email || '';
            document.querySelector('input[name="shipping_mobile_number"]').value = selectedOption.dataset.mobile ||
                '';
            document.querySelector('input[name="shipping_house"]').value = selectedOption.dataset.house || '';
            document.querySelector('input[name="shipping_city"]').value = selectedOption.dataset.city || '';
            document.querySelector('select[name="shipping_state"]').value = selectedOption.dataset.state || '';
            document.querySelector('input[name="shipping_zipcode"]').value = selectedOption.dataset.zipcode || '';
        });

        document.getElementById('payment_details').addEventListener('change', function() {
            let selectedOption = this.options[this.selectedIndex];

            document.querySelector('input[name="card_name"]').value = selectedOption.dataset.card_name || '';
            document.querySelector('input[name="card_owner_name"]').value = selectedOption.dataset
                .card_owner_name || '';
            document.querySelector('input[name="card_number"]').value = selectedOption.dataset.card_number || '';
            document.querySelector('input[name="mm"]').value = selectedOption.dataset.mm || '';
            document.querySelector('input[name="yy"]').value = selectedOption.dataset.yy || '';
            document.querySelector('input[name="cvv"]').value = selectedOption.dataset.cvv || '';
        });

        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();

            let cardNumberInput = document.querySelector('input[name="card_number"]');
            cardNumberInput.value = cardNumberInput.value.replace(/\s+/g, '');

            let mobileNumber = document.querySelector('input[name="shipping_mobile_number"]');
            mobileNumber.value = mobileNumber.value.replace(/\s+/g, '');

            $('.border-red-500').removeClass('border-red-500');
            $('.text-red-500').text('');

            let paymentMethod = document.querySelector('input[name="DeliveryOption"]:checked').value;
            let valid = true;
            const fields = [{
                    name: 'shipping_full_name',
                    required: true
                },
                {
                    name: 'shipping_email',
                    required: true
                },
                {
                    name: 'shipping_mobile_number',
                    required: true
                },
                {
                    name: 'shipping_house',
                    required: true
                },
                {
                    name: 'shipping_city',
                    required: true
                },
                {
                    name: 'shipping_state',
                    required: true
                },
                {
                    name: 'shipping_zipcode',
                    required: true
                },
            ];
            if (paymentMethod === 'Online Payment') {
                fields.push({
                    name: 'card_name',
                    required: true
                }, {
                    name: 'card_owner_name',
                    required: true
                }, {
                    name: 'card_number',
                    required: true
                }, {
                    name: 'mm',
                    required: true
                }, {
                    name: 'yy',
                    required: true
                }, {
                    name: 'cvv',
                    required: true
                });
            }

            fields.forEach(field => {
                const input = $(`[name="${field.name}"]`);
                if (field.required && !input.val().trim()) {
                    input.addClass('border-red-500');
                    input.next('.text-red-500').text(
                        `${field.name.replace('shipping_', '').replace('_', ' ')} is required.`
                    );
                    valid = false;
                }
            });

            if (!valid) return;

            Swal.fire({
                title: "Are you sure you want to place the order?",
                text: "Once confirmed, this action cannot be reverted!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, place order!",
                customClass: {
                    confirmButton: 'bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-green-700 hover:shadow-xl hover:text-white',
                    cancelButton: 'bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 ml-2',
                    popup: 'rounded-lg shadow-lg border border-gray-200',
                    title: 'text-lg font-semibold text-gray-800',
                    htmlContainer: 'text-sm text-gray-600',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('postCheckout') }}',
                        type: 'post',
                        data: $('form').serialize(),
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == true) {
                                Swal.fire({
                                    title: "Success!",
                                    text: response.message,
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false
                                });

                                setTimeout(() => {
                                    window.location.href =
                                        "{{ route('OrderSummery', ['oId' => 'PLACEHOLDER']) }}"
                                        .replace('PLACEHOLDER', response.oId);
                                }, 2000);

                                const toast = document.getElementById('toast-danger');
                                const toastMessage = toast.querySelector('.text-sm');
                                toastMessage.innerText = response.message;
                                if (response.status == true) {
                                    toast.classList.remove('hidden', 'bg-white',
                                        'text-gray-500', 'dark:bg-gray-800',
                                        'dark:text-gray-400');
                                    toast.classList.add('bg-green-100', 'text-green-700',
                                        'dark:bg-green-800', 'dark:text-green-200');
                                }
                            }
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                const errors = xhr.responseJSON.errors;
                                Object.keys(errors).forEach(field => {
                                    const input = $(`[name="${field}"]`);
                                    input.addClass('border-red-500');
                                    input.next('.text-red-500').text(errors[field][0]);

                                    if (field === 'shipping_state') {
                                        $('#shipping_state').next('.text-red-500').text(
                                            errors[field][0]);
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: "Error!",
                                    text: "An unexpected error occurred.",
                                    icon: "error",
                                    confirmButtonText: "Okay"
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
