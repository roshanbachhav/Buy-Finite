<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<body>
    @include('navbar')
    @include('layouts.profile')
    <div class="mt-16">
        <div class="sm:ml-64">
            <div
                class="max-w-5xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
                <div class="bg-gradient-to-r from-purple-600 to-indigo-400 p-6">
                    <div class="flex justify-between">
                        <div class="">
                            <h2 class="text-2xl font-semibold text-white">Personal Details</h2>
                            <p class="text-sm text-blue-100">Manage your personal information and contact details.</p>
                        </div>
                        <div class="">
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
                    </div>
                </div>

                @if ($userDetails)
                    <div class="p-6 space-y-8">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 items-center">
                            <div class="sm:col-span-1">
                                <label class="block text-sm font-medium text-gray-500">Full Name</label>
                            </div>
                            <div class="sm:col-span-2">
                                <p class="text-gray-900 font-medium text-lg">
                                    {{ $userDetails->user_full_name }}
                                </p>
                            </div>
                        </div>
                        <div class="border-b border-gray-100"></div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                            <div class="sm:col-span-1">
                                <label class="block text-sm font-medium text-gray-500">Email Address</label>
                            </div>
                            <div class="sm:col-span-2">
                                <p class="text-gray-900 font-medium text-lg">
                                    {{ $userDetails->user_email }}
                                </p>
                            </div>
                        </div>
                        <div class="border-b border-gray-100"></div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                            <div class="sm:col-span-1">
                                <label class="block text-sm font-medium text-gray-500">Mobile Number</label>
                            </div>
                            <div class="sm:col-span-2">
                                <p class="text-gray-900 font-medium text-lg">
                                    +91 {{ $userDetails->user_mobile_number }}
                                </p>
                            </div>
                        </div>
                        <div class="border-b border-gray-100"></div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                            <div class="sm:col-span-1">
                                <label class="block text-sm font-medium text-gray-500">Address</label>
                            </div>
                            <div class="sm:col-span-2 space-y-2">
                                <address class="text-gray-900 font-medium text-lg w-80">
                                    {{ $userDetails->user_house }}
                                </address>
                            </div>
                        </div>
                        <div class="border-b border-gray-100"></div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                            <div class="sm:col-span-1">
                                <label class="block text-sm font-medium text-gray-500">City</label>
                            </div>
                            <div class="sm:col-span-2">
                                <p class="text-gray-900 font-medium text-lg">
                                    {{ $userDetails->user_city }}
                                </p>
                            </div>
                        </div>
                        <div class="border-b border-gray-100"></div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                            <div class="sm:col-span-1">
                                <label class="block text-sm font-medium text-gray-500">State</label>
                            </div>
                            <div class="sm:col-span-2">
                                <p class="text-gray-900 font-medium text-lg">
                                    {{ $state->state_name }}
                                </p>
                            </div>
                        </div>
                        <div class="border-b border-gray-100"></div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                            <div class="sm:col-span-1">
                                <label class="block text-sm font-medium text-gray-500">Zip Code</label>
                            </div>
                            <div class="sm:col-span-2">
                                <p class="text-gray-900 font-medium text-lg">
                                    {{ $userDetails->user_zipcode }}
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="p-6">
                        <p class="text-red-600 font-semibold">
                            You haven't added your address yet.
                        </p>
                        <a href="{{ route('getAddUserShipping') }}" class="text-blue-600 underline">
                            Click here to add your address
                        </a>
                    </div>
                @endif
                <div class="p-6 border-t border-gray-100 flex gap-x-5">

                    <button data-popover-target="popover-hover" data-popover-trigger="hover" type="button"
                        class="inline-flex items-center px-6 py-3 border border-black text-black font-semibold rounded-lg hover:from-gray-700 hover:to-gray-300 transition-all transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18"
                            color="#d0021b" fill="none" class="mr-2">
                            <path
                                d="M5.32171 9.6829C7.73539 5.41196 8.94222 3.27648 10.5983 2.72678C11.5093 2.42437 12.4907 2.42437 13.4017 2.72678C15.0578 3.27648 16.2646 5.41196 18.6783 9.6829C21.092 13.9538 22.2988 16.0893 21.9368 17.8293C21.7376 18.7866 21.2469 19.6548 20.535 20.3097C19.241 21.5 16.8274 21.5 12 21.5C7.17265 21.5 4.75897 21.5 3.46496 20.3097C2.75308 19.6548 2.26239 18.7866 2.06322 17.8293C1.70119 16.0893 2.90803 13.9538 5.32171 9.6829Z"
                                stroke="currentColor" stroke-width="1.5" />
                            <path d="M11.992 16H12.001" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12 13L12 8.99997" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        Credential
                    </button>

                    <div data-popover id="popover-hover" role="tooltip"
                        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-xs opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                            <h3 class="font-semibold text-gray-900 dark:text-white">Main Login Email</h3>
                        </div>
                        <div class="px-3 py-2">
                            <p class="text-black">{{ $user->email }}</p>
                        </div>
                        <div data-popper-arrow></div>
                    </div>

                    <a href="{{ route('getEditUserProfile') }}">
                        <button
                            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Profile
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
