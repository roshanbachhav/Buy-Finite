<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<body>
    @include('navbar')
    @include('layouts.profile')
    <div class="mt-16">
        <div class="p-4 sm:ml-64 mt-15">
            <form method="post" action="{{ route('putEditUserShipping', $sa->id) }}"
                class="max-w-5xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
                @method('put')
                @csrf
                <div class="bg-gradient-to-r from-purple-600 to-indigo-400 p-6">
                    <h2 class="text-2xl font-semibold text-white">Edit {{ Str::limit($sa->shipping_house, 15) }} Shipping
                        Address</h2>
                    <p class="text-sm text-blue-100">Ooo You might be something changes.</p>
                </div>

                <div class="p-6 space-y-8">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                        <div class="sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700">Full Name</label>
                        </div>
                        <div class="sm:col-span-2">
                            <input type="text" name="name" value="{{ old('name', $sa->shipping_full_name) }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('user_full_name') border-red-500 @enderror">

                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                        <div class="sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700">Email Address</label>
                        </div>
                        <div class="sm:col-span-2">
                            <input type="email" name="email" value="{{ old('email', $sa->shipping_email) }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('user_email') border-red-500 @enderror">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                        <div class="sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700">Mobile Number</label>
                        </div>
                        <div class="sm:col-span-2">
                            <input type="tel" name="phone_number"
                                value="{{ old('phone_number', $sa->shipping_mobile_number) }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('user_mobile_number') border-red-500 @enderror">
                            @error('phone_number')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-start">
                        <div class="sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700 mt-2">Address</label>
                        </div>
                        <div class="sm:col-span-2">
                            <textarea name="house"
                                class="w-full px-4 py-2 border rounded-lg h-32 focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('user_house') border-red-500 @enderror">
                                {{ old('house', $sa->shipping_house) }}
                            </textarea>
                            @error('house')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                        <div class="sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700">City</label>
                        </div>
                        <div class="sm:col-span-2">
                            <input type="text" name="city" value="{{ old('city', $sa->shipping_city) }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('city') border-red-500 @enderror">
                            @error('city')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                        <div class="sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700">State</label>
                        </div>
                        <div class="sm:col-span-2">
                            <select name="state_id" id="state_id"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('state_id') border-red-500 @enderror">
                                <option value="">Select State</option>
                                @foreach ($states as $s)
                                    <option value="{{ $s->id }}"
                                        {{ $s->id == $sa->states_id ? 'selected' : '' }}>
                                        {{ $s->state_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('state_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                        <div class="sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-700">Zip Code</label>
                        </div>
                        <div class="sm:col-span-2">
                            <input type="text" name="zipcode" value="{{ old('zipcode', $sa->shipping_zipcode) }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('zipcode') border-red-500 @enderror">
                            @error('zipcode')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="p-6 border-t border-gray-100 flex justify-end gap-4">
                    <a href="{{ route('userShipping') }}">
                        <button type="button"
                            class="px-6 py-3 border text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition-all">
                            Cancel
                        </button>
                    </a>
                    <button type="reset"
                        class="px-6 py-3 bg-gradient-to-r from-red-600 to-orange-400 text-white font-semibold rounded-lg hover:from-red-700 hover:to-orange-600 transition-all transform hover:scale-105">
                        Clear Inputs
                    </button>
                    <button type="submit"
                        class="px-6 py-3 bg-gradient-to-r from-purple-600 to-indigo-500 text-white font-semibold rounded-lg hover:from-purple-700 hover:to-indigo-600 transition-all transform hover:scale-105">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
