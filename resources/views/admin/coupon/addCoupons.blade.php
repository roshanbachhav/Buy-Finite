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
                        Coupon Generator
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
                        Create New Coupon
                    </h2>
                </div>

                <div class="p-8">
                    <form action="{{ route('postCoupons') }}" method="post" id="couponForm"
                        class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @csrf
                        <div class="space-y-6">
                            <div class="group relative">
                                <label class="block text-sm font-medium text-gray-600 mb-2">Coupon Code</label>
                                <div class="relative">
                                    <input type="text" name="code" value="{{ old('code') }}"
                                        placeholder="SAMPLE30"
                                        class="uppercase w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200
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
                                    <input type="number" name="value" value="{{ old('value') }}" placeholder="1"
                                        step="0.01"
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
                                    <input type="date" name="start_date" value="{{ old('start_date') }}"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 transition-all duration-200 @error('start_date') border-red-500 @enderror">
                                    @error('start_date')
                                        <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="group">
                                    <label class="block text-sm font-medium text-gray-600 mb-2">End Date</label>
                                    <input type="date" name="end_date" value="{{ old('end_date') }}"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 transition-all duration-200 @error('end_date') border-red-500 @enderror">
                                    @error('end_date')
                                        <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="group">
                                <label class="block text-sm font-medium text-gray-600 mb-2">Usage Limit</label>
                                <input type="number" name="usage_limit" placeholder="1"
                                    value="{{ old('usage_limit') }}"
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
                                    <input type="number" name="min_amount" value="{{ old('min_amount') }}"
                                        step="0.01" placeholder="1"
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
                                        <input id="default-radio-1" checked type="radio" value="1"
                                            name="is_active"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                    <span class="ml-3 text-sm font-medium text-gray-600">Active Coupon</span>
                                </label>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <div class="flex items-center">
                                        <input id="default-radio-2" type="radio" value="0" name="is_active"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                    <span class="ml-3 text-sm font-medium text-gray-600">Inactive Coupon</span>
                                </label>
                            </div>
                        </div>

                        <div class="md:col-span-2 flex justify-end gap-4 mt-8">
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
                                Create Coupon
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden mb-8">
                <div
                    class="flex justify-between items-center bg-gradient-to-r from-blue-50 to-purple-50 px-8 py-6 border-b border-gray-200">

                    <h2 class="text-2xl font-semibold text-gray-800 flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-tag">
                            <path
                                d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z" />
                            <circle cx="7.5" cy="7.5" r=".5" fill="currentColor" />
                        </svg>
                        Coupons List
                    </h2>

                    <div class="relative w-64">
                        <input id="inputText"
                            class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-gray-500 bg-transparent px-3 py-2.5 !pr-9 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                            placeholder=" " />
                        <label
                            class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                            Search
                        </label>
                    </div>
                </div>

                <div
                    class="glass-container bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 overflow-hidden">

                    <div class="grid grid-cols-9 gap-4 px-6 py-4 bg-white/20 border-b border-white/30">
                        <div class="text-xs font-semibold ">Code</div>
                        <div class="text-xs font-semibold ">Type</div>
                        <div class="text-xs font-semibold ">Value</div>
                        <div class="text-xs font-semibold ">Min Amount</div>
                        <div class="text-xs font-semibold ">Start Date</div>
                        <div class="text-xs font-semibold ">End Date</div>
                        <div class="text-xs font-semibold ">Usage Limit</div>
                        <div class="text-xs font-semibold ml-2">Status</div>
                        <div class="text-xs font-semibold ml-2">Actions</div>
                    </div>

                    <div class="divide-y divide-white/20">
                        @if ($coupons->isNotEmpty())
                            @foreach ($coupons as $c)
                                <div
                                    class="grid grid-cols-9 gap-4 px-6 py-4 hover:bg-gray-200 transition-colors coupon-row">
                                    <div class="text-xs coupon-code">{{ $c->code }}</div>
                                    <div class="text-xs">{{ $c->type }}</div>
                                    <div class="text-xs">{{ $c->value }}</div>
                                    <div class="text-xs">₹{{ $c->min_amount }}</div>
                                    <div class="text-xs">{{ \Carbon\Carbon::parse($c->start_date)->format('d M, Y') }}
                                    </div>
                                    <div class="text-xs">{{ \Carbon\Carbon::parse($c->end_date)->format('d M, Y') }}
                                    </div>
                                    <div class="text-xs ml-5">{{ $c->usage_limit }}</div>
                                    <div>
                                        {!! $c->is_active === 1
                                            ? '<span class="px-3 py-1 rounded-full bg-green-500/20 text-black text-sm">Active</span>'
                                            : '<span class="px-3 py-1 rounded-full bg-red-500/20 text-red-900 text-sm">Inactive</span>' !!}

                                    </div>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('getCouponEdit', $c->id) }}">
                                            <button class="p-1.5 hover:bg-white/10 rounded-lg transition-colors">
                                                <svg class="w-5 h-5 text-blue-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </button>
                                        </a>
                                        <form action="{{ route('deleteCoupon', $c->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                class="p-1.5 hover:bg-white/10 rounded-lg transition-colors">
                                                <svg class="w-5 h-5 text-red-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="flex items-center mx-2 p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                                role="alert">
                                <svg class="shrink-0 inline w-4 h-4 me-3 text-red-700" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div class="text-red-700">
                                    <span class="font-medium">Opps!</span> No Copons was added by admin.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('inputText').addEventListener('input', function(e) {
            const term = e.target.value.toLowerCase();
            document.querySelectorAll('.coupon-row').forEach(rows => {
                const text = rows.querySelector('.coupon-code')?.textContent.toLowerCase() || '';
                rows.style.display = text.includes(term) ? "" : "none";
            });
        })
    </script>

</body>

</html>
