<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<body>
    @include('navbar')
    <div class="text-gray-900 flex justify-center shadow-2xl overflow-hidden mt-5">
        <div
            class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1 overflow-hidden">

            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-5 flex flex-col justify-center">
                @session('error')
                    <div id="alert-3"
                        class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            {{ Session::get('error') }}
                        </div>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endsession
                @session('success')
                    <div id="alert-3"
                        class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            {{ Session::get('success') }}
                        </div>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endsession
                <div class="flex justify-center">
                    <img src="/Images/web-img/buyfinite-logo.png" class="w-72 h-auto" />
                </div>
                <div class="mt-2 flex flex-col items-center flex-grow">
                    <div class="w-full flex-1">
                        <form action="{{ route('postSignup') }}" method="POST">
                            @csrf
                            <div class="mx-auto max-w-xs">
                                <div class="mb-5">
                                    <input
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white  
                                        @error('name') border-red-500 @enderror"
                                        type="text" name="name" placeholder="Enter Your Full Name"
                                        value="{{ old('name') }}" />
                                    @error('name')
                                        <span class="font-medium text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-5">
                                    <input
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white 
                                        @error('email') border-red-500 @enderror"
                                        type="email" name="email" placeholder="Enter Your Email"
                                        value="{{ old('email') }}" />
                                    @error('email')
                                        <span class="font-medium text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-5">
                                    <input
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white
                                        @error('password') border-red-500 @enderror"
                                        type="password" name="password" placeholder="Enter Your Password"
                                        value="{{ old('password') }}" />
                                    @error('password')
                                        <span class="font-medium text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-5">
                                    <input
                                        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white
                                        @error('password_confirmation') border-red-500 @enderror"
                                        type="password" name="password_confirmation"
                                        placeholder="Same Password add here"
                                        value="{{ old('password_confirmation') }}" />
                                    @error('password_confirmation')
                                        <span class="font-medium text-red-400 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit"
                                    class="mt-5 tracking-wide font-semibold bg-[#c747b2] text-white w-full py-4 rounded-lg hover:bg-purple-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                    <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                        <circle cx="8.5" cy="7" r="4" />
                                        <path d="M20 8v6M23 11h-6" />
                                    </svg>
                                    <span class="ml-2">Sign In</span>
                                </button>

                                <div class="flex items-center justify-center w-full my-3">
                                    <div class="flex-grow border-t border-gray-300"></div>
                                    <span class="px-4 text-sm font-semibold text-gray-500">OR</span>
                                    <div class="flex-grow border-t border-gray-300"></div>
                                </div>

                                <a href="{{ route('auth.google.redirect') }}"
                                    class="tracking-wide font-semibold bg-white text-black w-full py-4 rounded-lg border border-gray-200 hover:bg-gray-500 hover:text-white transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none shadow-[0px_7px_29px_0px_rgba(100,100,111,0.2)]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                        height="24" color="#000000" fill="none">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="1.5" />
                                        <path
                                            d="M12 12H17C17 14.7614 14.7614 17 12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C13.3807 7 14.6307 7.55964 15.5355 8.46447"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <span class="ml-2">Sign Up With Google</span>
                                </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="flex-1 bg-green-100 text-center hidden lg:flex overflow-hidden">
                <div class="m-0 w-full h-full bg-cover bg-center bg-no-repeat"
                    style="background-image: url('/Images/web-img/admin-login.png');">
                </div>
            </div>
        </div>
    </div>
</body>

</html>
