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
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18"
                                    height="18" color="#000000" fill="none">
                                    <path
                                        d="M13.6177 21.367C13.1841 21.773 12.6044 22 12.0011 22C11.3978 22 10.8182 21.773 10.3845 21.367C6.41302 17.626 1.09076 13.4469 3.68627 7.37966C5.08963 4.09916 8.45834 2 12.0011 2C15.5439 2 18.9126 4.09916 20.316 7.37966C22.9082 13.4393 17.599 17.6389 13.6177 21.367Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path
                                        d="M15.5 11C15.5 12.933 13.933 14.5 12 14.5C10.067 14.5 8.5 12.933 8.5 11C8.5 9.067 10.067 7.5 12 7.5C13.933 7.5 15.5 9.067 15.5 11Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                </svg>
                                Shipping List
                            </h2>
                        </div>
                        <div class="">
                            <a href="{{ route('getAddUserShipping') }}">
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
                                    Add Shipping Address
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="glass-container bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 overflow-hidden">
                    <div class="grid grid-cols-7 gap-4 px-6 py-4 bg-white/20 border-b border-gray-100">
                        <div class="text-xs font-semibold col-span-1">Name</div>
                        <div class="text-xs font-semibold col-span-1">Email</div>
                        <div class="text-xs font-semibold col-span-1">House Details</div>
                        <div class="text-xs font-semibold col-span-1">City</div>
                        <div class="text-xs font-semibold col-span-1">State</div>
                        <div class="text-xs font-semibold col-span-1">Zipcode</div>
                        <div class="text-xs font-semibold col-span-1">Actions</div>
                    </div>

                    <div class="divide-y divide-white/20">
                        @if ($sa->isNotEmpty())
                            @foreach ($sa as $s)
                                <div class="grid grid-cols-7 gap-4 px-6 py-4 hover:bg-gray-200 transition-colors">
                                    <div class="col-span-1">
                                        <div class="text-xs font-medium truncate">{{ $s->shipping_full_name }}</div>
                                        <div class="text-xs text-gray-500 truncate">{{ $s->shipping_mobile_number }}
                                        </div>
                                    </div>

                                    <div class="col-span-1">
                                        <div class="text-xs truncate" title="{{ $s->shipping_email }}">
                                            {{ Str::limit($s->shipping_email, 15) }}
                                        </div>
                                    </div>

                                    <div class="col-span-1">
                                        <div class="text-xs truncate" title="{{ $s->shipping_house }}">
                                            {{ Str::limit($s->shipping_house, 15) }}
                                        </div>
                                    </div>

                                    <div class="col-span-1">
                                        <div class="text-xs truncate">{{ $s->shipping_city }}</div>
                                    </div>

                                    <div class="col-span-1">
                                        <div class="text-xs truncate"> {{ $s->state->state_name }}</div>
                                    </div>

                                    <div class="col-span-1">
                                        <div class="text-xs">{{ $s->shipping_zipcode }}</div>
                                    </div>

                                    <div class="col-span-1 flex space-x-2">
                                        <a href="{{ route('getEditUserShipping', $s->id) }}">
                                            <button class="p-1.5 hover:bg-white/10 rounded-lg transition-colors">
                                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </button>
                                        </a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('deleteShippingAddress', $s->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                class="p-1.5 hover:bg-white/10 rounded-lg transition-colors">
                                                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
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
                                <span class="font-medium">No shipping addresses found!</span>
                            </div>
                        @endif
                    </div>
                    <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
