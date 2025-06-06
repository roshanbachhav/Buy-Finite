@php
    $currentRoute = Route::currentRouteName();
@endphp


<aside id="default-sidebar"
    class="mt-16 fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="min-h-full flex flex-row bg-white">
        <div
            class="flex flex-col w-64 bg-white/90 backdrop-blur-xl border-r border-gray-100 rounded-r-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:border-gray-200">

            <div class="flex items-center justify-center h-20 border-b border-gray-100">
                <h1
                    class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-500 bg-clip-text text-transparent">
                    BUY FINITE
                </h1>
            </div>

            <ul class="flex flex-col px-4 py-6 space-y-1">
                <li>
                    <a href="{{ route('userProfile') }}"
                        class="flex items-center p-3 space-x-3 rounded-3xl group relative overflow-hidden transition-all duration-300 hover:bg-indigo-50 hover:scale-[1.02]
                        {{ $currentRoute == 'userProfile' ? 'bg-indigo-100 scale-[1.07] rounded-full h-10 shadow-md' : 'hover:bg-indigo-50 hover:scale-[1.02]' }}">
                        <span class="text-indigo-600 text-lg p-2 rounded-lg">
                            <i class="fas fa-user-circle w-5 h-5"></i>
                        </span>
                        <span class="text-sm font-medium text-gray-700 group-hover:text-indigo-700">
                            Profile
                        </span>
                        <div
                            class="absolute right-0 w-1 h-6 bg-indigo-500 rounded-l-lg opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                    </a>
                </li>

                {{-- <li>
                    <a href="#"
                        class="flex items-center p-3 space-x-3 rounded-lg group relative overflow-hidden transition-all duration-300 hover:bg-cyan-50 hover:scale-[1.02]">
                        <span class="text-cyan-600 text-lg bg-cyan-100 p-2 rounded-lg">
                            <i class="fas fa-shopping-cart w-5 h-5"></i>
                        </span>
                        <span class="text-sm font-medium text-gray-700 group-hover:text-cyan-700">
                            Cart
                        </span>
                        <span class="ml-auto px-2 py-1 text-xs bg-cyan-100 text-cyan-600 rounded-full">3</span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('userOrders') }}"
                        class="flex items-center p-3 space-x-3 rounded-3xl group relative overflow-hidden transition-all duration-300 hover:bg-purple-50 hover:scale-[1.02]
                        {{ $currentRoute == 'userOrders' ? 'bg-purple-100 scale-[1.07] rounded-full h-10 shadow-md' : 'hover:bg-purple-50 hover:scale-[1.02]' }}">
                        <span class="text-purple-600 text-lg p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"
                                color="#9333ea" fill="none">
                                <path
                                    d="M12 22C11.1818 22 10.4002 21.6698 8.83693 21.0095C4.94564 19.3657 3 18.5438 3 17.1613C3 16.7742 3 10.0645 3 7M12 22C12.8182 22 13.5998 21.6698 15.1631 21.0095C19.0544 19.3657 21 18.5438 21 17.1613V7M12 22L12 11.3548"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M8.32592 9.69138L5.40472 8.27785C3.80157 7.5021 3 7.11423 3 6.5C3 5.88577 3.80157 5.4979 5.40472 4.72215L8.32592 3.30862C10.1288 2.43621 11.0303 2 12 2C12.9697 2 13.8712 2.4362 15.6741 3.30862L18.5953 4.72215C20.1984 5.4979 21 5.88577 21 6.5C21 7.11423 20.1984 7.5021 18.5953 8.27785L15.6741 9.69138C13.8712 10.5638 12.9697 11 12 11C11.0303 11 10.1288 10.5638 8.32592 9.69138Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M6 12L8 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M17 4L7 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="text-sm font-medium text-gray-700 group-hover:text-purple-700">
                            Orders
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('changePassword') }}"
                        class="flex items-center p-3 space-x-3 rounded-3xl group relative overflow-hidden transition-all duration-300 hover:bg-pink-50 hover:scale-[1.02]
                        {{ $currentRoute == 'changePassword' ? 'bg-pink-100 scale-[1.07] rounded-full h-10 shadow-md' : 'hover:bg-pink-50 hover:scale-[1.02]' }}">
                        <span class="text-pink-600 text-lg p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-rotate-ccw-key-icon lucide-rotate-ccw-key">
                                <path d="m14.5 9.5 1 1" />
                                <path d="m15.5 8.5-4 4" />
                                <path d="M3 12a9 9 0 1 0 9-9 9.74 9.74 0 0 0-6.74 2.74L3 8" />
                                <path d="M3 3v5h5" />
                                <circle cx="10" cy="14" r="2" />
                            </svg>
                        </span>
                        <span class="text-sm font-medium text-gray-700 group-hover:text-pink-700">
                            Change Password
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('userShipping') }}"
                        class="flex items-center p-3 space-x-3 rounded-3xl group relative overflow-hidden transition-all duration-300 hover:bg-emerald-50 hover:scale-[1.02] 
                        {{ $currentRoute == 'userShipping' ? 'bg-emerald-100 scale-[1.07] rounded-full h-10 shadow-md' : 'hover:bg-emerald-50 hover:scale-[1.02]' }}">
                        <span class="text-emerald-600 text-lg p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"
                                color="#059669" fill="none">
                                <path
                                    d="M3 2H4.30116C5.48672 2 6.0795 2 6.4814 2.37142C6.88331 2.74285 6.96165 3.36307 7.11834 4.60351L8.24573 13.5287C8.45464 15.1826 8.5591 16.0095 9.09497 16.5048C9.63085 17 10.4212 17 12.002 17H22"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <circle cx="11.5" cy="19.5" r="1.5" stroke="currentColor"
                                    stroke-width="1.5" />
                                <circle cx="18.5" cy="19.5" r="1.5" stroke="currentColor"
                                    stroke-width="1.5" />
                                <path
                                    d="M18 14H16C14.1144 14 13.1716 14 12.5858 13.4142C12 12.8284 12 11.8856 12 10V8C12 6.11438 12 5.17157 12.5858 4.58579C13.1716 4 14.1144 4 16 4H18C19.8856 4 20.8284 4 21.4142 4.58579C22 5.17157 22 6.11438 22 8V10C22 11.8856 22 12.8284 21.4142 13.4142C20.8284 14 19.8856 14 18 14Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M16.5 7L17.5 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="text-sm font-medium text-gray-700 group-hover:text-emerald-700">
                            Shipping
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('userPayment') }}"
                        class="flex items-center p-3 space-x-3 rounded-3xl group relative overflow-hidden transition-all duration-300 hover:bg-amber-50 hover:scale-[1.02]
                        {{ $currentRoute == 'userPayment' ? 'bg-amber-100 scale-[1.07] rounded-full h-10 shadow-md' : 'hover:bg-amber-50 hover:scale-[1.02]' }}">
                        <span class="text-amber-600 text-lg p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"
                                color="#d97706" fill="none">
                                <path
                                    d="M16 13C16 13.8284 16.6716 14.5 17.5 14.5C18.3284 14.5 19 13.8284 19 13C19 12.1716 18.3284 11.5 17.5 11.5C16.6716 11.5 16 12.1716 16 13Z"
                                    stroke="currentColor" stroke-width="1.5" />
                                <path
                                    d="M11 19H16C18.8284 19 20.2426 19 21.1213 18.1213C22 17.2426 22 15.8284 22 13V12C22 9.17157 22 7.75736 21.1213 6.87868C20.48 6.23738 19.5534 6.06413 18 6.01732M10 6H16C16.7641 6 17.425 6 18 6.01732M2 10C2 6.22876 2 5.34315 3.17157 4.17157C4.34315 3 6.22876 3 10 3H14.9827C15.9308 3 16.4049 3 16.7779 3.15749C17.2579 3.36014 17.6399 3.7421 17.8425 4.22208C18 4.5951 18 5.06917 18 6.01732"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M3.125 19.5L3.125 13.5M5 13.5V12M5 21V19.5M3.125 16.5H6.875M6.875 16.5C7.49632 16.5 8 17.0037 8 17.625V18.375C8 18.9963 7.49632 19.5 6.875 19.5H2M6.875 16.5C7.49632 16.5 8 15.9963 8 15.375V14.625C8 14.0037 7.49632 13.5 6.875 13.5H2"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span class="text-sm font-medium text-gray-700 group-hover:text-amber-700">
                            Payments
                        </span>
                    </a>
                </li>
            </ul>

            <div class="mt-auto h-1 bg-gradient-to-r from-indigo-400 to-purple-400 opacity-20 blur-sm"></div>
        </div>
    </div>
</aside>
