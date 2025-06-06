<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<body>

    @include('navbar')

    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 pt-16">
            <form action="{{ route('productsPage') }}" method="get">
                <div class="w-full">
                    <div class="flex justify-center">
                        <div class="flex w-full max-w-3xl items-center relative">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="absolute w-5 h-5 left-3 text-slate-600 pointer-events-none">
                                <path fill-rule="evenodd"
                                    d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <input name="searchInput" value="{{ request('searchInput') }}"
                                class="flex-grow bg-transparent placeholder:text-slate-400 text-slate-700 h-12 text-sm border border-slate-200 rounded-md pl-10 pr-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                                placeholder="Search Products by using product name. eg Nike Shoes..." />

                            <button type="submit"
                                class="ml-3 whitespace-nowrap rounded-md bg-slate-800 py-2 w-28 h-12 px-4 text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 active:bg-slate-700">
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            @if ($products->count() == 0)
                <p class="text-center text-slate-500 mt-4">No products found for your search.</p>
            @endif

        </div>

        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            {{-- <header>
                <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">Product Collection</h2>

                <p class="mt-4 max-w-lg text-gray-500">
                    Discover our exclusive product collection, featuring top-quality items tailored to meet your needs
                    and preferences. Shop confidently with detailed descriptions, competitive pricing, and seamless
                    browsing for a superior shopping experience.
                </p>
            </header> --}}
            <div class="mt-8 block lg:hidden">
                <button
                    class="flex cursor-pointer items-center gap-2 border-b border-gray-400 pb-1 text-gray-900 transition hover:border-gray-600">
                    <span class="text-sm font-medium"> Filters & Sorting </span>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4 rtl:rotate-180">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </button>
            </div>

            <div class="mt-4 lg:mt-8 lg:grid lg:grid-cols-4 lg:items-start lg:gap-8">
                <div class="hidden space-y-4 lg:block">
                    <div class="">
                        <label for="SortBy" class="block text-xs font-medium text-gray-700"> Sort By </label>

                        <select id="SortBy" class="mt-1 rounded border-gray-300 text-sm p-2"
                            onchange="handleSortFunction()">
                            <option value="created_at,desc">Sort By</option>
                            <option value="productName,asc">Title, A to Z</option>
                            <option value="productName,desc">Title, Z to A</option>
                            <option value="ourPrice,asc">Price, L to H</option>
                            <option value="ourPrice,desc">Price, H to L</option>
                        </select>
                    </div>

                    <div>
                        <p class="block text-xs font-medium text-gray-700">Filters</p>

                        <div class="mt-1 space-y-2">
                            <details
                                class="overflow-hidden rounded border border-gray-300 [&_summary::-webkit-details-marker]:hidden">
                                <summary
                                    class="flex cursor-pointer items-center justify-between gap-2 p-4 text-gray-900 transition">
                                    <span class="text-sm font-medium"> Categories </span>

                                    <span class="transition group-open:-rotate-180">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </span>
                                </summary>

                                <div class="border-t border-gray-200 bg-white">
                                    <form method="GET" action="{{ route('productsPage') }}">
                                        <header class="flex items-center justify-between p-4">
                                            <span
                                                class="text-sm text-gray-700">{{ count(request()->get('category_id', [])) }}
                                                Selected </span>

                                            <button type="reset"
                                                class="text-sm text-gray-900 underline underline-offset-4"
                                                onclick="this.form.reset(); window.location.href='{{ route('productsPage') }}';">
                                                Reset
                                            </button>
                                        </header>
                                        <ul class="space-y-1 border-t border-gray-200 p-4">
                                            @foreach ($categories as $c)
                                                <li>
                                                    <label for="category_{{ $c->id }}"
                                                        class="inline-flex items-center gap-2">
                                                        <input type="checkbox" id="category_{{ $c->id }}"
                                                            name="category_id[]" value="{{ $c->id }}"
                                                            class="size-5 rounded border-gray-300"
                                                            {{ in_array($c->id, request()->get('category_id', [])) ? 'checked' : '' }} />
                                                        <span class="text-sm font-medium text-gray-700">
                                                            {{ $c->name }}
                                                        </span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </form>
                                </div>
                            </details>

                            <details
                                class="overflow-hidden rounded border border-gray-300 [&_summary::-webkit-details-marker]:hidden">
                                <summary
                                    class="flex cursor-pointer items-center justify-between gap-2 p-4 text-gray-900 transition">
                                    <span class="text-sm font-medium"> Price </span>

                                    <span class="transition group-open:-rotate-180">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </span>
                                </summary>

                                <div class="border-t border-gray-200 bg-white">
                                    <header class="flex items-center justify-between p-4">
                                        <span class="text-sm text-gray-700"> The max price is ₹{{ $maxPrice }}
                                        </span>

                                        <button type="button"
                                            class="text-sm text-gray-900 underline underline-offset-4">
                                            Reset
                                        </button>
                                    </header>

                                    <div class="border-t border-gray-200 p-4">
                                        <input type="text" class="js-range-slider" name="price_range"
                                            value="" />
                                    </div>

                                </div>
                            </details>

                            <details
                                class="overflow-hidden rounded border border-gray-300 [&_summary::-webkit-details-marker]:hidden">
                                <summary
                                    class="flex cursor-pointer items-center justify-between gap-2 p-4 text-gray-900 transition">
                                    <span class="text-sm font-medium"> Top Brands </span>

                                    <span class="transition group-open:-rotate-180">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </span>
                                </summary>

                                <div class="border-t border-gray-200 bg-white">
                                    <form method="GET" action="{{ route('productsPage') }}">
                                        <header class="flex items-center justify-between p-4">
                                            <span
                                                class="text-sm text-gray-700">{{ count(request()->get('brand_id', [])) }}
                                                Selected </span>

                                            <button type="reset"
                                                class="text-sm text-gray-900 underline underline-offset-4"
                                                onclick="this.form.reset(); window.location.href='{{ route('productsPage') }}';">
                                                Reset
                                            </button>
                                        </header>
                                        <ul class="space-y-1 border-t border-gray-200 p-4">
                                            @foreach ($brands as $b)
                                                <li>
                                                    <label for="category_{{ $b->id }}"
                                                        class="inline-flex items-center gap-2">
                                                        <input type="checkbox" id="brand_{{ $b->id }}"
                                                            name="brand_id[]" value="{{ $b->id }}"
                                                            class="size-5 rounded border-gray-300"
                                                            {{ in_array($b->id, request()->get('brand_id', [])) ? 'checked' : '' }} />
                                                        <span class="text-sm font-medium text-gray-700">
                                                            {{ $b->brand_name }}
                                                        </span>
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </form>
                                </div>
                            </details>
                        </div>
                        {{-- Clear Filter btn --}}
                        <div class="">
                            @if (count(request()->except('page')) > 0)
                                <span class="relative flex justify-center my-5">
                                    <div
                                        class="absolute inset-x-0 top-1/2 h-px -translate-y-1/2 bg-transparent bg-gradient-to-r from-transparent via-gray-500 to-transparent opacity-75">
                                    </div>

                                    <span class="relative z-10 bg-white px-6">OR</span>
                                </span>
                                <div class="flex justify-center">
                                    <button type="reset"
                                        class="group relative inline-block overflow-hidden border border-purple-600 px-8 py-1 focus:outline-none focus:ring"
                                        onclick="window.location.href='{{ route('productsPage') }}';">
                                        <span
                                            class="absolute inset-y-0 left-0 w-[2px] bg-purple-600 transition-all group-hover:w-full group-active:bg-purple-500"></span>

                                        <span
                                            class="relative text-sm font-medium text-purple-600 transition-colors group-hover:text-white">
                                            Clear All Filters
                                        </span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <ul class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($products as $p)
                            <li class="my-3">
                                <a href="{{ route('productOverview', $p->id) }}" class="group block overflow-hidden">
                                    <img src="{{ asset('images/product_img/' . $p->productImage) }}"
                                        alt="{{ $p->productName }}"
                                        class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]" />

                                    <div class="relative bg-white pt-3">
                                        <h3
                                            class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4">
                                            {{ $p->productName }}
                                        </h3>

                                        <div class="flex flex-row mt-2 space-x-1">
                                            <p class="">
                                                <span class="sr-only"> Regular Price </span>

                                                <span class="tracking-wider text-base text-gray-900">
                                                    ₹{{ $p->ourPrice }}
                                                </span>
                                            </p>
                                            <p class="">
                                                <span class="sr-only"> list Price </span>

                                                <span class="tracking-wider text-xs line-through text-red-700">
                                                    ₹{{ $p->listPrice }} </span>
                                            </p>
                                        </div>
                                        <div class="flex items-center">
                                            @for ($i = 0; $i < $p->starRating; $i++)
                                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                            @endfor
                                            @for ($i = $p->starRating + 1; $i <= 5; $i++)
                                                <svg class="w-4 h-4 ms-1 text-gray-300 dark:text-gray-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                            @endfor
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="container my-5">
            <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
                <a href="{{ $products->previousPageUrl() }}">
                    <button
                        class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        type="button" {{ $products->onFirstPage() ? 'disabled' : '' }} wire:click="previousPage">
                        Previous
                    </button>
                </a>

                <div class="flex flex-col items-center gap-2 paginate-integers">
                    {{ $products->links() }}
                </div>

                <a href="{{ $products->nextPageUrl() }}">
                    <button
                        class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        type="button" {{ $products->hasMorePages() ? '' : 'disabled' }} wire:click="nextPage">
                        Next
                    </button>
                </a>
            </div>
        </div>

    </section>

    @include('footer')

    <script>
        $(".js-range-slider").ionRangeSlider({
            type: "double",
            min: 100,
            max: {{ $maxPrice }},
            from: 0,
            to: {{ $maxPrice }},
            grid: true,
            postfix: " ₹",
            onFinish: function(data) {
                const params = new URLSearchParams(window.location.search);
                params.set('min_price', data.from);
                params.set('max_price', data.to);
                window.location.search = params.toString();
            }
        });




        function handleSortFunction() {
            const sortValue = document.getElementById('SortBy').value;
            const params = new URLSearchParams(window.location.search);
            params.set('sort', sortValue);
            window.location.search = params.toString();
        }

        let timer;
        document.querySelectorAll('input[name="category_id[]"], input[name="brand_id[]"]').forEach((checkbox) => {
            checkbox.addEventListener('change', () => {
                clearTimeout(timer);
                timer = setTimeout(() => {
                    const form = checkbox.closest('form');
                    const params = new URLSearchParams(window.location.search);


                    new FormData(form).forEach((value, key) => {
                        params.append(key, value);
                    });

                    window.location.search = params.toString();
                }, 3000);
            });
        });
    </script>
</body>

</html>
