@extends('layouts.head')

<nav class="fixed inset-x-0 top-0 transform transition-all duration-300 ease-in-out backdrop-blur-sm bg-white/30 hover:bg-white/50 z-50"
    id="navbar">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-gray-900 text-xl font-bold">BUY FINITE</a>
            </div>

            <div class="hidden sm:ml-6 sm:block">
                <div class="flex space-x-4">
                    <a href="{{ route('home') }}"
                        class="text-gray-900 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Home</a>
                    <a href="{{ route('productsPage') }}"
                        class="text-gray-900 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Products</a>
                    <a href="{{ route('cartPage') }}"
                        class="text-gray-900 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Cart</a>
                    @if (!Auth::user())
                        <a href="{{ route('login') }}"
                            class="text-gray-900 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Login</a>
                        <a href="{{ route('signup') }}"
                            class="text-gray-900 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Sign
                            Up</a>
                    @else
                        <a href="{{ route('userProfile') }}"
                            class="text-gray-900 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Profile</a>
                        <a href="{{ route('userLogout') }}"
                            class="text-gray-900 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Logout</a>
                    @endif
                </div>
            </div>

            <div class="flex items-center sm:hidden">
                <button type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-900 hover:text-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-900"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="sm:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}"
                class="block text-gray-900 hover:text-gray-700 px-3 py-2 rounded-md text-base font-medium transition duration-300">Home</a>
            <a href="{{ route('productsPage') }}"
                class="block text-gray-900 hover:text-gray-700 px-3 py-2 rounded-md text-base font-medium transition duration-300">Products</a>
            <a href="{{ route('cartPage') }}"
                class="block text-gray-900 hover:text-gray-700 px-3 py-2 rounded-md text-base font-medium transition duration-300">Cart</a>
            @if (!Auth::user())
                <a href="{{ route('login') }}"
                    class="block text-gray-900 hover:text-gray-700 px-3 py-2 rounded-md text-base font-medium transition duration-300">Login</a>
                <a href="{{ route('signup') }}"
                    class="block text-gray-900 hover:text-gray-700 px-3 py-2 rounded-md text-base font-medium transition duration-300">Sign
                    Up</a>
            @else
                <a href="{{ route('userLogout') }}"
                    class="block text-gray-900 hover:text-gray-700 px-3 py-2 rounded-md text-base font-medium transition duration-300">Logout</a>
                <a href="{{ route('userProfile') }}"
                    class="block text-gray-900 hover:text-gray-700 px-3 py-2 rounded-md text-base font-medium transition duration-300">Profile</a>
            @endif
        </div>
    </div>
</nav>

<script>
    const navbar = document.getElementById('navbar');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 0) {
            navbar.classList.remove('bg-white/30', 'hover:bg-white/50');
            navbar.classList.add('bg-white/90', 'backdrop-blur-md', 'shadow-sm');
        } else {
            navbar.classList.remove('bg-white/90', 'backdrop-blur-md', 'shadow-sm');
            navbar.classList.add('bg-white/30', 'hover:bg-white/50');
        }
    });
</script>
