<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<body class="bg-gray-50 flex items-center justify-center min-h-screen px-4">
    <div class="w-full max-w-md space-y-6">

        <div class="absolute inset-0 z-0 overflow-hidden">
            <div class="absolute -top-20 -left-20 w-96 h-96 bg-[#7e0048] opacity-20 rounded-full blur-[120px]"></div>
            <div
                class="absolute bottom-0 right-0 w-80 h-80 bg-purple-900 opacity-20 rounded-full blur-[100px] translate-x-1/3 translate-y-1/3">
            </div>

            <svg aria-hidden="true" class="absolute inset-0 w-full h-full">
                <defs>
                    <pattern id="pattern-bg" x="0" y="0" width="200" height="200" patternUnits="userSpaceOnUse">
                        <path d="M130 200V.5M.5 .5H200" fill="none" stroke="#f0f0f0" stroke-width="1" />
                    </pattern>
                </defs>
                <rect fill="url(#pattern-bg)" width="100%" height="100%" />
            </svg>
        </div>

        <div class="relative z-10 w-full max-w-md space-y-6">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900">Reset your password</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Enter your new password below.
                </p>

                @if (session('status'))
                    <div class="text-green-600 text-sm mt-4">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <form action="{{ route('recovery.password.update') }}" method="POST"
                class="bg-white p-6 rounded-lg shadow">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('password') border-red-500 @enderror" />
                    @error('password')
                        <span class="font-normal text-base text-red-400">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                        Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                  focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                    @error('password_confirmation')
                        <span class="font-normal text-base text-red-400">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md 
               shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none 
               focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Reset Password
                    </button>
                </div>
            </form>

            <div class="text-center text-sm text-gray-500">
                <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Back to login</a>
            </div>
        </div>

    </div>
</body>

</html>
