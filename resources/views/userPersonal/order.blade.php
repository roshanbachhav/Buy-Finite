<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<body>
    @include('navbar')
    @include('layouts.profile')
    <div class="mt-16">
        <div class="p-4 sm:ml-64 mt-15">
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden mb-8">
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 px-8 py-6 border-b border-gray-200">
                    <div class="flex justify-between">
                        <div class="">
                            <h2 class="text-2xl font-semibold text-gray-800 flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                    color="#000000" fill="none">
                                    <path
                                        d="M11.5 8H20.196C20.8208 8 21.1332 8 21.3619 8.10084C22.3736 8.5469 21.9213 9.67075 21.7511 10.4784C21.7205 10.6235 21.621 10.747 21.4816 10.8132C20.9033 11.0876 20.4982 11.6081 20.3919 12.2134L19.7993 15.5878C19.5386 17.0725 19.4495 19.1943 18.1484 20.2402C17.1938 21 15.8184 21 13.0675 21H10.9325C8.18162 21 6.8062 21 5.8516 20.2402C4.55052 19.1942 4.46138 17.0725 4.20066 15.5878L3.60807 12.2134C3.50177 11.6081 3.09673 11.0876 2.51841 10.8132C2.37896 10.747 2.27952 10.6235 2.24894 10.4784C2.07874 9.67075 1.6264 8.5469 2.63812 8.10084C2.86684 8 3.17922 8 3.80397 8H7.5"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M14 12L10 12" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.5 11L10 3M15 3L17.5 8" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                </svg>
                                {{ $user->name }} - Orders
                            </h2>
                        </div>
                    </div>
                </div>
                <div
                    class="glass-container bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 overflow-hidden">
                    <div class="grid grid-cols-6 gap-4 px-6 py-4 bg-white/20 border-b border-gray-100">
                        <div class="text-xs font-semibold col-span-1">Order Id</div>
                        <div class="text-xs font-semibold col-span-1">Total</div>
                        <div class="text-xs font-semibold col-span-1">Order placed</div>
                        <div class="text-xs font-semibold col-span-1">Ship To</div>
                        <div class="text-xs font-semibold col-span-1">Status</div>
                        <div class="text-xs font-semibold col-span-1">Payment</div>
                    </div>

                    <div class="divide-y divide-white/20">
                        @if ($orders->isNotEmpty())
                            @foreach ($orders as $o)
                                <div class="grid grid-cols-6 gap-4 px-6 py-4 hover:bg-gray-200 transition-colors">

                                    <div class="col-span-1">
                                        <div class="text-xs truncate" title="{{ $o->id }}">
                                            <a href="{{ route('userOrdersDetails', $o->id) }}">
                                                #order{{ $o->id }}
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-span-1">
                                        <div class="text-xs truncate" title="{{ $o->total_amount }}">
                                            {{ '₹ ' . number_format($o->total_amount, 2) }}
                                        </div>
                                    </div>

                                    <div class="col-span-1">
                                        <div class="text-xs truncate" title="{{ $o->created_at }}">
                                            {{ $o->created_at->format('d M, Y') }}
                                        </div>
                                    </div>

                                    <div class="col-span-1">
                                        <div class="text-xs truncate" title="{{ $user->username }}">
                                            {{ $user->name }}
                                        </div>
                                    </div>

                                    <div class="col-span-1">
                                        <div
                                            class="text-xs truncate relative flex items-center gap-2 px-2 py-1 font-sans font-bold uppercase rounded-md select-none whitespace-nowrap max-w-fit inline-block
                                            {{ $o->status === 'completed'
                                                ? 'bg-green-500/20 text-green-900'
                                                : ($o->status === 'processing'
                                                    ? 'bg-blue-500/20 text-blue-900'
                                                    : ($o->status === 'canceled'
                                                        ? 'bg-red-500/20 text-red-900'
                                                        : 'bg-amber-500/20 text-amber-900')) }}">

                                            @if ($o->status === 'pending')
                                                <svg class="w-4 h-4 text-amber-900" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6v6l4 2"></path>
                                                </svg>
                                            @elseif ($o->status === 'processing')
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
                                            @elseif ($o->status === 'completed')
                                                <svg class="w-4 h-4 text-green-900" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            @elseif ($o->status === 'canceled')
                                                <svg class="w-4 h-4 text-red-900" fill="none" stroke="currentColor"
                                                    stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            @endif

                                            <span>{{ ucfirst($o->status) }}</span>
                                        </div>
                                    </div>

                                    <div class="col-span-1">
                                        <div
                                            class="text-xs truncate relative grid items-center px-2 py-1 font-sans font-bold uppercase rounded-md select-none whitespace-nowrap {{ $o->payment_status === 'paid' ? 'bg-green-500/20 text-green-900' : 'bg-amber-500/20 text-amber-900' }} max-w-fit inline-block">
                                            <span>{{ $o->payment_status === 'paid' ? 'Paid' : 'Unpaid' }}</span>
                                        </div>
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
                                <span class="font-medium">No order found yet!</span>
                            </div>
                        @endif
                    </div>
                    <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
                        <a href="{{ $orders->previousPageUrl() }}">
                            <button
                                class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button" {{ $orders->onFirstPage() ? 'disabled' : '' }}
                                wire:click="previousPage">
                                Previous
                            </button>
                        </a>

                        <div class="flex flex-col items-center gap-2 paginate-integers">
                            {{ $orders->links() }}
                        </div>

                        <a href="{{ $orders->nextPageUrl() }}">
                            <button
                                class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button" {{ $orders->hasMorePages() ? '' : 'disabled' }} wire:click="nextPage">
                                Next
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
