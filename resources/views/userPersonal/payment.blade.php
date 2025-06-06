<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<body>
    @include('navbar')
    @include('layouts.profile')
    <div class="mt-16">
        <div class="p-4 sm:ml-64 mt-15">
            <div class="fixed bottom-4 right-4 flex items-center z-50">
                @if (session('success'))
                    <div id="successAlert"
                        class="max-w-xs bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-neutral-800 dark:border-neutral-700"
                        role="alert" tabindex="-1" aria-labelledby="hs-toast-success-example-label">
                        <div class="flex p-4">
                            <div class="shrink-0">
                                <svg class="shrink-0 size-4 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ms-3">
                                <p id="hs-toast-success-example-label"
                                    class="text-sm text-gray-700 dark:text-neutral-400">
                                    {{ session('success') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <script>
                        setTimeout(() => {
                            document.getElementById('successAlert').style.display = 'none';
                        }, 3000);
                    </script>
                @endif
            </div>
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden mb-8">
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 px-8 py-6 border-b border-gray-200">
                    <div class="flex justify-between">
                        <div class="">
                            <h2 class="text-2xl font-semibold text-gray-800 flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30"
                                    height="30" color="#000000" fill="none">
                                    <path
                                        d="M2 12C2 8.46252 2 6.69377 3.0528 5.5129C3.22119 5.32403 3.40678 5.14935 3.60746 4.99087C4.86213 4 6.74142 4 10.5 4H13.5C17.2586 4 19.1379 4 20.3925 4.99087C20.5932 5.14935 20.7788 5.32403 20.9472 5.5129C22 6.69377 22 8.46252 22 12C22 15.5375 22 17.3062 20.9472 18.4871C20.7788 18.676 20.5932 18.8506 20.3925 19.0091C19.1379 20 17.2586 20 13.5 20H10.5C6.74142 20 4.86213 20 3.60746 19.0091C3.40678 18.8506 3.22119 18.676 3.0528 18.4871C2 17.3062 2 15.5375 2 12Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M10 16H11.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M14.5 16L18 16" stroke="currentColor" stroke-width="1.5"
                                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M2 9H22" stroke="currentColor" stroke-width="1.5"
                                        stroke-linejoin="round" />
                                </svg>
                                Payments List
                            </h2>
                        </div>
                        <div class="">
                            <a href="{{ route('getAddUserPayment') }}">
                                <button
                                    class="h-10 flex select-none items-center gap-3 rounded-lg bg-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16"
                                        height="16" color="#fff" fill="none">
                                        <path
                                            d="M9.87868 20.1214C10.7574 21.0001 12.1716 21.0001 15 21.0001C17.8284 21.0001 19.2426 21.0001 20.1213 20.1214C21 19.2428 21 17.8285 21 15.0001C21 12.1717 21 10.7575 20.1213 9.8788C19.2426 9.00012 17.8284 9.00012 15 9.00012C12.1716 9.00012 10.7574 9.00012 9.87868 9.8788C9 10.7575 9 12.1717 9 15.0001C9 17.8285 9 19.2428 9.87868 20.1214Z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M17.9239 9.00012C17.828 8.02504 17.6112 7.36869 17.1213 6.8788C16.2426 6.00012 14.8284 6.00012 12 6.00012C9.17157 6.00012 7.75736 6.00012 6.87868 6.8788C6 7.75748 6 9.17169 6 12.0001C6 14.8285 6 16.2428 6.87868 17.1214C7.36857 17.6113 8.02491 17.8281 9 17.924"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M14.9239 6.00012C14.828 5.02504 14.6112 4.36869 14.1213 3.8788C13.2426 3.00012 11.8284 3.00012 9 3.00012C6.17157 3.00012 4.75736 3.00012 3.87868 3.8788C3 4.75748 3 6.17169 3 9.00012C3 11.8285 3 13.2428 3.87868 14.1214C4.36857 14.6113 5.02491 14.8281 6 14.924"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    Add Payment Address
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="glass-container bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 overflow-hidden">
                    <div class="grid grid-cols-7 gap-4 px-6 py-4 bg-white/20 border-b border-gray-100">
                        <div class="text-xs font-semibold col-span-1">Card Owner Name</div>
                        <div class="text-xs font-semibold col-span-1">Card Name</div>
                        <div class="text-xs font-semibold col-span-1">Card Number</div>
                        <div class="text-xs font-semibold col-span-1 ml-4">Month</div>
                        <div class="text-xs font-semibold col-span-1">Year</div>
                        <div class="text-xs font-semibold col-span-1">CVV</div>
                        <div class="text-xs font-semibold col-span-1">Action</div>
                    </div>

                    <div class="divide-y divide-white/20">
                        @if ($p->isNotEmpty())
                            @foreach ($p as $payment)
                                <div class="grid grid-cols-7 gap-4 px-6 py-4 hover:bg-gray-200 transition-colors">
                                    {{-- <div class="col-span-1 flex items-center">
                                        <div class="text-xs font-medium truncate">{{ $payment->shipping_full_name }}</div>
                                        <div class="text-xs text-gray-500 truncate">{{ $payment->shipping_mobile_number }}
                                        </div>
                                    </div> --}}

                                    <div class="col-span-1 flex items-center">
                                        <div class="text-xs truncate">
                                            {{ $payment->card_owner_name }}
                                        </div>
                                    </div>

                                    <div class="col-span-1 flex items-center">
                                        <div class="text-xs truncate" title="{{ $payment->card_name }}">
                                            {{ $payment->card_name }}
                                        </div>
                                    </div>

                                    <div class="col-span-1 flex items-center">
                                        <div class="text-xs truncate" title="{{ $payment->card_number }}">
                                            {{ $payment->card_number }}
                                        </div>
                                    </div>

                                    <div class="col-span-1 flex items-center">
                                        <div class="text-xs ml-4 truncate" title="{{ $payment->mm }}">
                                            {{ $payment->mm }}
                                        </div>
                                    </div>

                                    <div class="col-span-1 flex items-center">
                                        <div class="text-xs truncate" title="{{ $payment->yy }}">
                                            {{ $payment->yy }}
                                        </div>
                                    </div>

                                    <div class="col-span-1 flex items-center">
                                        <div class="text-xs truncate" title="{{ $payment->cvv }}">
                                            {{ $payment->cvv }}
                                        </div>
                                    </div>

                                    <div class="col-span-1 flex space-x-2">
                                        <a href="{{ route('getEditUserShipping', $payment->id) }}">
                                            <button class="p-1.5 hover:bg-white/10 rounded-lg transition-colors">
                                                <svg class="w-5 h-5 text-blue-500" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </button>
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('deleteShippingAddress', $payment->id) }}"
                                            method="post">
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
                            <div class="p-6 text-center text-red-500">
                                <svg class="mx-auto w-8 h-8 mb-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <span class="font-medium">No payment addresses found!</span>
                            </div>
                        @endif
                    </div>
                    {{-- <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
                        <a href="{{ $sa->previousPageUrl() }}">
                            <button
                                class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button" {{ $sa->onFirstPage() ? 'disabled' : '' }} wire:click="previousPage">
                                Previous
                            </button>
                        </a>

                        <div class="flex flex-col items-center gap-2 paginate-integers">
                            {{ $sa->links() }}
                        </div>

                        <a href="{{ $sa->nextPageUrl() }}">
                            <button
                                class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button" {{ $sa->hasMorePages() ? '' : 'disabled' }} wire:click="nextPage">
                                Next
                            </button>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>



    {{-- <div class="bg-gradient-to-r from-purple-700 to-indigo-600 p-8 relative">
        <div class="absolute top-4 right-4 flex space-x-2">
            <div class="w-12 h-8 bg-white/20 rounded-md"></div>
            <div class="w-12 h-8 bg-white/20 rounded-md"></div>
        </div>
        <div class="space-y-6 text-white">
            <div>
                <label class="text-sm opacity-80">Card Number</label>
                <div class="text-xl font-mono tracking-wider">**** **** **** 1234</div>
            </div>
            <div class="flex justify-between">
                <div>
                    <label class="text-sm opacity-80">Card Holder</label>
                    <div class="font-medium">JOHN DOE</div>
                </div>
                <div>
                    <label class="text-sm opacity-80">Expires</label>
                    <div class="font-medium">12/24</div>
                </div>
            </div>
        </div>
    </div> --}}
</body>

</html>
