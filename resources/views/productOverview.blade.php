<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<body>

    @include('navbar')
    <div class="bg-gray-100  mt-16">
        <div id="toast-danger" class="hidden fixed right-5 flex items-center w-full max-w-xs p-4 mb-4 rounded-lg shadow"
            role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
            </div>
            <div class="ms-3 text-sm font-normal">Your message here</div>
        </div>

        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-nowrap -mx-4 flex-row">
                <div class="w-full xl:w-1/2 px-4 mb-8">
                    <img src="{{ asset('images/product_img/' . $p->productImage) }}" alt="Product"
                        class="w-full h-auto rounded-lg shadow-md mb-4" id="mainImage">
                </div>

                <div class="w-full md:w-1/2 px-4">
                    <h2 class="text-4xl font-bold mb-2 uppercase">{{ $p->productName }}</h2>
                    <p class="text-gray-600 mb-4">SKU: {{ $p->category->slug }}</p>
                    <div class="mb-4">
                        <span class="text-2xl font-bold mr-2">₹{{ $p->ourPrice }}</span>
                        <span class="text-gray-500 line-through">₹{{ $p->listPrice }}</span>
                    </div>
                    <div class="flex items-center mb-4">
                        @for ($i = 0; $i < $p->starRating; $i++)
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                        @endfor
                        @for ($i = $p->starRating + 1; $i <= 5; $i++)
                            <svg class="w-4 h-4 ms-1 text-gray-300 dark:text-gray-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path
                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                            </svg>
                        @endfor
                        <span class="ml-2 text-gray-600">{{ number_format($p->starRating, 1) }} (120 reviews)</span>
                    </div>
                    <p class="text-gray-700 mb-6">{{ $p->description }}</p>

                    {{-- <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">Color:</h3>
                        <div class="flex space-x-2">
                            <button
                                class="w-8 h-8 bg-black rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black"></button>
                            <button
                                class="w-8 h-8 bg-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300"></button>
                            <button
                                class="w-8 h-8 bg-blue-500 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"></button>
                        </div>
                    </div> --}}

                    <div class="mb-6">
                        <div>
                            <label for="Quantity" class="sr-only"> Quantity </label>

                            <div class="flex items-center gap-1">
                                <button type="button"
                                    class="decrease-btn size-10 leading-10 text-gray-600 transition hover:opacity-75">
                                    &minus;
                                </button>

                                <input type="number" min="1" value="1" id="qty"
                                    class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />

                                <button type="button"
                                    class="increase-btn size-10 leading-10 text-gray-600 transition hover:opacity-75">
                                    &plus;
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-4 mb-6">
                        <a href="javascript:void(0);" onclick="addToCart({{ $p->id }})">
                            <button
                                class="bg-purple-600 flex gap-2 items-center text-white px-6 py-2 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                                Add to Cart
                            </button>
                        </a>
                        <button
                            class="bg-gray-200 flex gap-2 items-center  text-gray-800 px-6 py-2 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                            </svg>
                            Wishlist
                        </button>
                    </div>

                    {{-- <div>
                        <h3 class="text-lg font-semibold mb-2">Key Features:</h3>
                        <ul class="list-disc list-inside text-gray-700">
                            <li>Industry-leading noise cancellation</li>
                            <li>30-hour battery life</li>
                            <li>Touch sensor controls</li>
                            <li>Speak-to-chat technology</li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    @include('footer')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const qtyInput = document.getElementById("qty");
            const increaseBtn = document.querySelector(".increase-btn");
            const decreaseBtn = document.querySelector(".decrease-btn");
            const maxQty = 5;

            // Increase quantity
            increaseBtn.addEventListener("click", function() {
                let currentValue = parseInt(qtyInput.value) + 1;
                if (currentValue <= maxQty) {
                    qtyInput.value = parseInt(qtyInput.value) + 1;
                }
            });

            // Decrease quantity, ensuring it doesn't go below the minimum value
            decreaseBtn.addEventListener("click", function() {
                if (parseInt(qtyInput.value) > 1) {
                    qtyInput.value = parseInt(qtyInput.value) - 1;
                }
            });
        });


        function addToCart(id) {
            $.ajax({
                url: '{{ route('addToCart') }}',
                type: 'post',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    const toast = document.getElementById('toast-danger');
                    const toastMessage = toast.querySelector('.text-sm');
                    toastMessage.innerText = response.message;
                    if (response.status) {
                        toast.classList.remove('hidden', 'bg-white', 'text-gray-500', 'dark:bg-gray-800',
                            'dark:text-gray-400');
                        toast.classList.add('bg-green-100', 'text-green-700', 'dark:bg-green-800',
                            'dark:text-green-200');
                    } else {
                        toast.classList.remove('hidden', 'bg-white', 'text-gray-500', 'dark:bg-gray-800',
                            'dark:text-gray-400');
                        toast.classList.add('bg-red-100', 'text-red-500', 'dark:bg-red-800',
                            'dark:text-red-200');
                    }
                    setTimeout(() => {
                        toast.classList.add('hidden');
                    }, 3000);
                },
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
            })
        }
    </script>
</body>

</html>
