<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<body>
    @include('navbar')
    @include('layouts.profile')
    <div class="mt-16">
        <div class="p-4 sm:ml-64 mt-15">

            <form method="post" action="{{ route('postAddUserPayment') }}"
                class="max-w-5xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden">
                @csrf
                <div class="bg-gradient-to-r from-purple-600 to-indigo-400 p-6">
                    <h2 class="text-2xl font-semibold text-white">Add New Payment Details</h2>
                    <p class="text-sm text-blue-100">Fill the proper fields for Payment</p>
                </div>

                <div class="p-8 space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Card Name</label>
                        <div class="relative">
                            <input type="text" name="cname" value="{{ old('cname') }}"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-100 focus:border-purple-500 focus:outline-none placeholder-gray-400 @error('cname') border-red-500 @enderror"
                                placeholder="Card Name like SBI, HDFC ...">
                            <div class="absolute right-4 top-3 flex space-x-2">
                                <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                            </div>
                        </div>
                        @error('cname')
                            <p class="text-red-500 text-sm mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Card Number</label>
                        <div class="relative">
                            <input type="text" name="cno" value="{{ old('cno') }}"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-100 focus:border-purple-500 focus:outline-none placeholder-gray-400 @error('cno') border-red-500 @enderror"
                                placeholder="4242 4242 4242 4242">
                            <div class="absolute right-4 top-3 flex space-x-2">
                                <svg class="w-8 h-8 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                            </div>
                        </div>
                        @error('cno')
                            <p class="text-red-500 text-sm mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Card Holder Name -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Card holder Name</label>
                        <input type="text" name="con" value="{{ old('con') }}"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-100 focus:border-purple-500 focus:outline-none uppercase placeholder-gray-400 @error('con') border-red-500 @enderror"
                            placeholder="Enter Proper Card Owner Name">
                        @error('con')
                            <p class="text-red-500 text-sm mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700">Expiration Date</label>
                            <div class="grid grid-cols-2 gap-3">
                                <input type="text" name="mm" value="{{ old('mm') }}"
                                    class="px-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-100 focus:border-purple-500 focus:outline-none placeholder-gray-400 @error('mm') border-red-500 @enderror"
                                    placeholder="MM">

                                <input type="text" name="yy" value="{{ old('yy') }}"
                                    class="px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-100 focus:border-purple-500 focus:outline-none placeholder-gray-400 @error('yy') border-red-500 @enderror"
                                    placeholder="YY">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-700">CVV</label>
                            <div class="relative">
                                <input type="text" name="cvv" value="{{ old('cvv') }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-100 focus:border-purple-500 focus:outline-none placeholder-gray-400 @error('cvv') border-red-500 @enderror"
                                    placeholder="123">
                                <div class="absolute right-4 top-3">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                @error('cvv')
                                    <p class="text-red-500 text-sm mt-1 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="pt-8 flex justify-end space-x-4">
                        <a href="{{ route('userPayment') }}"
                            class="px-6 py-3 text-gray-600 hover:text-gray-800 transition-colors">
                            Cancel
                        </a>
                        <button type="reset"
                            class="px-6 py-3 bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 transition-colors">
                            Clear
                        </button>
                        <button type="submit"
                            class="px-8 py-3 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition-colors shadow-lg">
                            Save Payment Method
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.querySelector('input[name="cno"]').addEventListener('input', function(e) {
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
    </script>
</body>

</html>
