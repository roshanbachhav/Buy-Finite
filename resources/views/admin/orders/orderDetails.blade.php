<!DOCTYPE html>
<html lang="en">
@extends('layouts.adminApp')

<body>
    @include('admin.sideMenu')
    <div class="p-4 sm:ml-64 bg-gray-200">

        <div class="p-8">
            <div class="bg-white shadow-2xl rounded-2xl p-8">
                <div class="">
                    <div class="flex items-center justify-start text-4xl ml-5 mt-5">
                        #Order{{ $orders->id }} Order Details
                    </div>
                    <div class="flex items-center justify-start text-4xl my-3 ml-5">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                                <li class="inline-flex items-center">
                                    <a href=""
                                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12"
                                            height="12" color="#000000" fill="none" class="mx-1">
                                            <circle cx="17.75" cy="6.25" r="4.25" stroke="currentColor"
                                                stroke-width="1.5" />
                                            <circle cx="6.25" cy="6.25" r="4.25" stroke="currentColor"
                                                stroke-width="1.5" />
                                            <circle cx="17.75" cy="17.75" r="4.25" stroke="currentColor"
                                                stroke-width="1.5" />
                                            <circle cx="6.25" cy="17.75" r="4.25" stroke="currentColor"
                                                stroke-width="1.5" />
                                        </svg>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="inline-flex items-center">
                                    <div class="flex items-center">
                                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <a href="{{ route('orderList') }}"
                                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                            Orders</a>
                                    </div>
                                </li>
                                <li aria-current="page">
                                    <div class="flex items-center">
                                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 9 4-4-4-4" />
                                        </svg>
                                        <span
                                            class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Order
                                            Summery - #Order{{ $orders->id }}</span>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="main">
                    <div class="flex justify-between">
                        <div class="w-96 mr-5 mt-5 space-y-6">

                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
                        <div
                            class="bg-gradient-to-r from-blue-50 col-span-2 to-purple-50 p-6 rounded-xl animate-fade-in">
                            <div class="border-b border-gray-200 pb-6 mb-6">
                                <h2 class="text-2xl font-bold text-gray-800 mb-6">Shipping Information</h2>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div class="bg-white p-4 rounded-lg shadow-sm">
                                        <p class="text-sm text-gray-500 mb-1">Order ID</p>
                                        <p class="text-lg font-semibold text-gray-800">#{{ $orders->id }}</p>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg shadow-sm">
                                        <p class="text-sm text-gray-500 mb-1">Shipped Date</p>
                                        <p class="text-lg font-semibold text-gray-800">October 10, 2023</p>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg shadow-sm">
                                        <p class="text-sm text-gray-500 mb-1">Status</p>
                                        <div
                                            class="text-xs truncate relative flex items-center gap-2 px-2 py-1 font-sans font-bold uppercase rounded-full select-none whitespace-nowrap max-w-fit 
                                            {{ $orders->status === 'completed'
                                                ? 'bg-green-500/20 text-green-900'
                                                : ($orders->status === 'processing'
                                                    ? 'bg-blue-500/20 text-blue-900'
                                                    : ($orders->status === 'canceled'
                                                        ? 'bg-red-500/20 text-red-900'
                                                        : 'bg-amber-500/20 text-amber-900')) }}">
                                            @if ($orders->status === 'pending')
                                                <svg class="w-4 h-4 text-amber-900" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6v6l4 2">
                                                    </path>
                                                </svg>
                                            @elseif ($orders->status === 'processing')
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="#1e3a8a" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-loader">
                                                    <path d="M12 2v4" />
                                                    <path d="m16.2 7.8 2.9-2.9" />
                                                    <path d="M18 12h4" />
                                                    <path d="m16.2 16.2 2.9 2.9" />
                                                    <path d="M12 18v4" />
                                                    <path d="m4.9 19.1 2.9-2.9" />
                                                    <path d="M2 12h4" />
                                                    <path d="m4.9 4.9 2.9 2.9" />
                                                </svg>
                                            @elseif ($orders->status === 'completed')
                                                <svg class="w-4 h-4 text-green-900" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5 13l4 4L19 7">
                                                    </path>
                                                </svg>
                                            @elseif ($orders->status === 'canceled')
                                                <svg class="w-4 h-4 text-red-900" fill="none"
                                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            @endif
                                            <span class="text-sm">{{ ucfirst($orders->status) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-b border-gray-200 pb-6 mb-6">
                                <h2 class="text-2xl font-bold text-gray-800 mb-6">Shipping Pricing</h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-white p-4 rounded-lg shadow-sm">
                                        <p class="text-sm text-gray-500 mb-1">SubTotal</p>
                                        <p class="text-lg font-semibold text-gray-800">₹ {{ $orders->subtotal }}</p>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg shadow-sm">
                                        <p class="text-sm text-gray-500 mb-1">Tax + Packaging</p>
                                        <p class="text-lg font-semibold text-gray-800">₹ {{ $orders->others_tax }}</p>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg shadow-sm">
                                        <p class="text-sm text-gray-500 mb-1">Discount</p>
                                        <p class="text-lg font-semibold text-gray-800">
                                            ₹{{ number_format($orders->discount, 2) }}<br>
                                            <span
                                                class="text-sm text-blue-600">({{ $orders->coupons->code ?? 'NA' }})</span>
                                        </p>
                                    </div>
                                    <div class="bg-white p-4 rounded-lg shadow-sm">
                                        <p class="text-sm text-gray-500 mb-1">Total</p>
                                        <p class="text-lg font-semibold text-green-600 animate-bounce">
                                            ₹ {{ number_format($orders->total_amount, 2) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-800 mb-6">Customer Details</h2>
                                <div class="bg-white p-6 rounded-lg shadow-sm space-y-3">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $orders->name }}</p>
                                            <p class="text-sm text-gray-600">{{ $orders->email }}</p>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4 pt-4">
                                        <div>
                                            <p class="text-sm text-gray-500 mb-1">Contact</p>
                                            <p class="font-medium text-gray-800">+91 {{ $orders->mobile_number }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500 mb-1">Shipping Address</p>
                                            <p class="font-medium text-gray-800">{{ $location }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-r from-green-50 to-teal-50 p-6 rounded-xl animate-fade-in">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">Updates Details</h2>
                            <form action="" method="post" class="space-y-6 mb-5">
                                @csrf
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Order Status</label>
                                    <div class="relative">
                                        <select name="status" id="status"
                                            class="w-full py-2 pl-3 pr-10 text-base border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all
                                                    {{ $orders->status === 'completed'
                                                        ? 'bg-green-50 border-green-200'
                                                        : ($orders->status === 'processing'
                                                            ? 'bg-blue-50 border-blue-200'
                                                            : ($orders->status === 'canceled'
                                                                ? 'bg-red-50 border-red-200'
                                                                : ($orders->status === 'shipped'
                                                                    ? 'bg-purple-50 border-purple-200'
                                                                    : ($orders->status === 'delivered'
                                                                        ? 'bg-teal-50 border-teal-200'
                                                                        : 'bg-amber-50 border-amber-200')))) }}">
                                            <option value="pending"
                                                {{ $orders->status == 'pending' ? 'selected' : '' }}>Pending
                                            </option>
                                            <option value="processing"
                                                {{ $orders->status === 'processing' ? 'selected' : '' }}>Processing
                                            </option>
                                            <option value="shipped"
                                                {{ $orders->status === 'shipped' ? 'selected' : '' }}>Shipped
                                            </option>
                                            <option value="delivered"
                                                {{ $orders->status === 'delivered' ? 'selected' : '' }}>Delivered
                                            </option>
                                            <option value="completed"
                                                {{ $orders->status === 'completed' ? 'selected' : '' }}>Completed
                                            </option>
                                            <option value="canceled"
                                                {{ $orders->status === 'canceled' ? 'selected' : '' }}>Canceled
                                            </option>
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Select Date &
                                        Time - Shipped</label>
                                    <div class="relative">
                                        <input type="datetime-local" name="shippedDT"
                                            class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                            value="{{ old('shippedDT', \Carbon\Carbon::parse($orders->shipped_date)->format('Y-m-d\TH:i')) }}">
                                        <button type="button"
                                            class="absolute right-3 top-2 text-gray-400 hover:text-gray-500">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Select Date &
                                        Time - Delivered</label>
                                    <div class="relative">
                                        <input type="datetime-local" name="deliveredDT"
                                            class="w-full py-2 px-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                            value="{{ old('deliveredDT', \Carbon\Carbon::parse($orders->delivered_date)->format('Y-m-d\TH:i')) }}">
                                        <button type="button"
                                            class="absolute right-3 top-2 text-gray-400 hover:text-gray-500">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <button type="submit"
                                        class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-all focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        Update Order
                                    </button>
                                </div>
                            </form>
                            <h2 class="text-2xl font-bold text-gray-800 mt-6">Send Mails</h2>
                            <form action="" method="post" name="sendMailId" id="sendMailId"
                                class="space-y-6">
                                @csrf

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Send Invoice To</label>
                                    <div class="relative">
                                        <select name="invoice_email"
                                            class="w-full py-2 pl-3 pr-10 text-base border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all bg-white">
                                            <option value="">Select Recipient</option>
                                            <option value="customer">Customer ({{ $orders->email }})</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <button type="submit"
                                        class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-all focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        Send Mail
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- Order Items -->
                <div class="border-t pt-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Order Items</h3>
                    <div class="space-y-4">
                        @foreach ($orderData as $od)
                            <div
                                class="flex items-center justify-between p-6 bg-gradient-to-r from-indigo-50 to-green-50 rounded-xl hover:shadow-md transition-shadow transform hover:scale-100 duration-300">
                                <div class="flex items-center">
                                    <img src="{{ asset('images/product_img/' . $od->product->productImage) }}"
                                        alt="Product Image" class="w-16 h-16 rounded-lg">
                                    <div class="ml-4">
                                        <p class="font-semibold text-gray-800">{{ $od->name }} *
                                            {{ $od->quantity }}</p>
                                        <p class="text-sm text-gray-500">₹ {{ number_format($od->price, 2) }}
                                        </p>
                                    </div>
                                </div>
                                <p class="text-lg font-semibold text-gray-800">₹
                                    {{ number_format($od->total, 2) }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        flatpickr('input[type="datetime-local"]', {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true,
            minuteIncrement: 15,
            disableMobile: "true"
        });

        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();

            jQuery.ajax({
                url: '{{ route('updateOrderStatusByAdmin', $orders->id) }}',
                type: 'post',
                data: $('form').serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        location.reload();
                    }
                }
            });
        });


        $("#sendMailId").submit(function(e) {
            e.preventDefault();

            jQuery.ajax({
                url: '{{ route('adminMailSenderById', $orders->id) }}',
                type: 'post',
                data: $('form').serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        location.reload();
                    }
                }
            });
        })
    </script>
    @livewireScripts
</body>
