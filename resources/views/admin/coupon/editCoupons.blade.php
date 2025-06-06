<!DOCTYPE html>
<html lang="en">
@extends('layouts.adminApp')

<body>
    @include('admin.sideMenu')
    <div class="p-4 sm:ml-64 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="container mx-auto px-4">

            <div class="flex items-center mt-4 mb-8 justify-between">
                <div class="flex items-center">
                    <h1
                        class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        {{ $coupon->code }} Coupon Update
                    </h1>
                    <div class="ml-3 w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            color="#5250b0" fill="none">
                            <path
                                d="M18.058 8.53645L17.058 7.92286C16.0553 7.30762 15.554 7 15 7C14.446 7 13.9447 7.30762 12.942 7.92286L11.942 8.53645C10.9935 9.11848 10.5192 9.40949 10.2596 9.87838C10 10.3473 10 10.9129 10 12.0442V17.9094C10 19.8377 10 20.8019 10.5858 21.4009C11.1716 22 12.1144 22 14 22H16C17.8856 22 18.8284 22 19.4142 21.4009C20 20.8019 20 19.8377 20 17.9094V12.0442C20 10.9129 20 10.3473 19.7404 9.87838C19.4808 9.40949 19.0065 9.11848 18.058 8.53645Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M14 7.10809C13.3612 6.4951 12.9791 6.17285 12.4974 6.05178C11.9374 5.91102 11.3491 6.06888 10.1725 6.3846L8.99908 6.69947C7.88602 6.99814 7.32949 7.14748 6.94287 7.5163C6.55624 7.88513 6.40642 8.40961 6.10679 9.45857L4.55327 14.8971C4.0425 16.6852 3.78712 17.5792 4.22063 18.2836C4.59336 18.8892 6.0835 19.6339 7.5 20"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M14.4947 10C15.336 9.44058 16.0828 8.54291 16.5468 7.42653C17.5048 5.12162 16.8944 2.75724 15.1836 2.14554C13.4727 1.53383 11.3091 2.90644 10.3512 5.21135C10.191 5.59667 10.0747 5.98366 10 6.36383"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center">
                    @if (session('success'))
                        <div id="successAlert"
                            class="mt-1 p-4 bg-green-50 border border-green-200 rounded-xl relative pr-10">
                            <p class="text-green-800">{{ session('success') }}</p>
                        </div>
                        <script>
                            setTimeout(() => {
                                document.getElementById('successAlert').style.display = 'none';
                            }, 5000);
                        </script>
                    @endif
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden mb-8">
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 px-8 py-6 border-b border-gray-200">
                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-tag">
                            <path
                                d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z" />
                            <circle cx="7.5" cy="7.5" r=".5" fill="currentColor" />
                        </svg>
                        Update Coupon
                    </h2>
                </div>

                <div class="p-8">
                    <form action="{{ route('editCoupon', $coupon->id) }}" method="post" id="couponForm"
                        class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @method('put')
                        @csrf
                        <div class="space-y-6">
                            <div class="group relative">
                                <label class="block text-sm font-medium text-gray-600 mb-2">Coupon Code</label>
                                <div class="relative">
                                    <input type="text" name="code" value="{{ old('code', $coupon->code) }}"
                                        placeholder="SAMPLE30"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200
                                           placeholder-gray-400 text-gray-700 bg-white shadow-sm hover:border-blue-300 @error('code') border-red-500 @enderror">
                                    @error('code')
                                        <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                    <div class="absolute right-3 top-3">
                                        <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="group">
                                <label class="block text-sm font-medium text-gray-600 mb-2">Discount Type</label>
                                <select name="type"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 transition-all duration-200 @error('type') border-red-500 @enderror
                                       appearance-none bg-white bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwb2x5bGluZSBwb2ludHM9IjYgOSAxMiAxNSAxOCA5Ij48L3BvbHlsaW5lPjwvc3ZnPg==')] bg-no-repeat bg-[right_1rem_center]">
                                    <option value="percent">Percentage Discount</option>
                                    <option value="fixed">Fixed Amount</option>
                                </select>
                                @error('type')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="group">
                                <label class="block text-sm font-medium text-gray-600 mb-2">Discount Value</label>
                                <div class="relative">
                                    <input type="number" name="value" value="{{ old('value', $coupon->value) }}"
                                        placeholder="1" step="0.01"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 transition-all duration-200 @error('value') border-red-500 @enderror
                                           placeholder-gray-400 text-gray-700 bg-white shadow-sm pr-12">
                                    @error('value')
                                        <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                    <span
                                        class="absolute right-3 top-3 text-gray-400 group-focus-within:text-blue-500">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="group">
                                    <label class="block text-sm font-medium text-gray-600 mb-2">Start Date</label>
                                    <input type="date" name="start_date"
                                        value="{{ old('start_date', $coupon->start_date) }}"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 transition-all duration-200 @error('start_date') border-red-500 @enderror">
                                    @error('start_date')
                                        <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="group">
                                    <label class="block text-sm font-medium text-gray-600 mb-2">End Date</label>
                                    <input type="date" name="end_date"
                                        value="{{ old('end_date', $coupon->end_date) }}"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 transition-all duration-200 @error('end_date') border-red-500 @enderror">
                                    @error('end_date')
                                        <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="group">
                                <label class="block text-sm font-medium text-gray-600 mb-2">Usage Limit</label>
                                <input type="number" name="usage_limit" placeholder="1"
                                    value="{{ old('usage_limit', $coupon->usage_limit) }}"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 transition-all duration-200 @error('usage_limit') border-red-500 @enderror
                                       placeholder-gray-400 text-gray-700 bg-white shadow-sm">
                                @error('usage_limit')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="group">
                                <label class="block text-sm font-medium text-gray-600 mb-2">Minimum Spend
                                    (optional)</label>
                                <div class="relative">
                                    <input type="number" name="min_amount"
                                        value="{{ old('min_amount', $coupon->min_amount) }}" step="0.01"
                                        placeholder="1"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 transition-all duration-200
                                        placeholder-gray-400 text-gray-700 bg-white shadow-sm @error('min_amount') border-red-500 @enderror">
                                    @error('min_amount')
                                        <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                    <span
                                        class="absolute text-base right-3 top-3 text-gray-400 group-focus-within:text-blue-500">₹</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 mt-4">
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <div class="flex items-center">
                                        <input id="default-radio-1" type="radio" value="1" name="is_active"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            {{ old('is_active', $coupon->is_active) == 1 ? 'checked' : '' }}>
                                    </div>
                                    <span class="ml-3 text-sm font-medium text-gray-600">Active Coupon</span>
                                </label>

                                <label class="relative inline-flex items-center cursor-pointer">
                                    <div class="flex items-center">
                                        <input id="default-radio-2" type="radio" value="0" name="is_active"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                            {{ old('is_active', $coupon->is_active) == 0 ? 'checked' : '' }}>
                                    </div>
                                    <span class="ml-3 text-sm font-medium text-gray-600">Inactive Coupon</span>
                                </label>
                            </div>
                        </div>

                        <div class="md:col-span-2 flex justify-end gap-4 mt-8">
                            <a href="{{ route('coupons') }}"
                                class="px-6 py-3 text-gray-600 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors duration-200
                            flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                    height="20" color="#544949" fill="none">
                                    <path
                                        d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path
                                        d="M7.03364 12.0065H13.0085M13.0085 12.0065C13.0085 12.5743 11.1343 14.0151 11.1343 14.0151M13.0085 12.0065C13.0085 11.424 11.1343 10.021 11.1343 10.021M16.0337 9.01074V15.0107"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                Cancel Update
                            </a>
                            <button type="reset"
                                class="px-6 py-3 text-gray-600 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors duration-200
                                   flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Reset Form
                            </button>
                            <button type="submit"
                                class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl hover:shadow-lg transition-all duration-200
                                   flex items-center gap-2">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Update Coupon
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
