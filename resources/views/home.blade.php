<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<body>
    @include('navbar')
    <section class="mt-16 container shadow-2xl scroll-smooth rounded-3xl focus:scroll-auto overflow-hidden"
        id="app">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:items-center md:gap-8 h-[70vh]">
                <div>
                    <div class="max-w-lg md:max-w-none">
                        <h2 class="text-2xl font-semibold text-gray-900 sm:text-3xl">
                            Welcome to BuyFinite
                        </h2>

                        <p class="mt-4 text-gray-700">
                            Discover a world of premium products at unbeatable prices. Shop confidently with our secure
                            checkout and enjoy fast delivery right to your doorstep. Explore categories ranging from
                            electronics to fashion, all in one place!
                        </p>
                    </div>
                    <a href="{{ route('productsPage') }}">
                        <button
                            class="relative w-56 h-20 my-5 text-white text-2xl bg-black border-2 border-black overflow-hidden transition-all duration-500 hover:shadow-[0_20px_40px_rgba(128,_0,_128,_0.7)] group">
                            <span class="relative z-10 transition-all duration-500 group-hover:text-black">
                                Checkout Store
                            </span>
                            <span
                                class="absolute inset-0 bg-white w-0 group-hover:w-full transition-all duration-500 ease-out"></span>
                        </button>
                    </a>
                </div>

                <div>
                    <img src="/Images/web-img/main_bg_2.jpeg"
                        class="h-full w-full object-cover sm:h-[calc(100%_-_2rem)] sm:self-end sm:rounded-ss-[30px] md:h-[calc(100%_-_4rem)] md:rounded-ss-[60px]"
                        alt="" />
                </div>
            </div>
        </div>
    </section>

    <div class="feature container flex my-14">
        @include('featured')
    </div>

    @include('footer')
</body>

</html>
