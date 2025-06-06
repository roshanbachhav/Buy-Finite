<!DOCTYPE html>
<html lang="en">

<body>
    @include('navbar')
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <div class="mx-auto max-w-3xl">
                <header class="text-center">
                    <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">Our Cart Summary</h1>
                </header>

                <div class="mt-8">
                    <ul class="space-y-4 rounded-lg shadow-xl p-4">
                        @if ($cartData && count($cartData) > 0)
                            @foreach ($cartData as $items)
                                <li class="flex items-center gap-4">
                                    <img src="{{ asset('images/product_img/' . $items->options->productImage) }}"
                                        alt="Product" class="size-20 rounded object-cover" />

                                    <div>
                                        <h3 class="text-lg text-gray-900">{{ $items->name }}</h3>

                                        <dl class="mt-0.5 space-y-px text-xs text-gray-600">
                                            <div>
                                                <dt class="inline">Price:</dt>
                                                <dd class="inline"> ₹ {{ $items->price }}</dd>
                                            </div>

                                            <div class="text-green-600">
                                                <dt class="inline">Total:</dt>
                                                <dd class="inline"> ₹ {{ $items->price * $items->qty }}</dd>
                                            </div>
                                        </dl>
                                    </div>

                                    <div class="flex flex-1 items-center justify-end gap-2">
                                        {{-- <form>
                                        <label for="Line1Qty" class="sr-only"> Quantity </label>

                                        <input type="number" min="1" value="1" id="Line1Qty"
                                            class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                                    </form> --}}

                                        <div>
                                            <label for="Quantity" class="sr-only"> Quantity </label>

                                            <div class="flex items-center gap-1">
                                                <button type="button" data-id="{{ $items->rowId }}"
                                                    class="decrease-btn size-10 leading-10 text-gray-600 transition hover:opacity-75">
                                                    &minus;
                                                </button>

                                                <input type="number" min="1" value="{{ $items->qty }}"
                                                    id="qty"
                                                    class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />

                                                <button type="button" data-id="{{ $items->rowId }}"
                                                    class="increase-btn size-10 leading-10 text-gray-600 transition hover:opacity-75">
                                                    &plus;
                                                </button>
                                            </div>
                                        </div>

                                        <button class="text-gray-600 transition hover:text-red-600"
                                            onclick="deleteItemsInCart('{{ $items->rowId }}');">

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <div class="p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                role="alert">
                                <span class="font-medium">Opps!</span> Your cart is empty now. Go product and buy fill
                                this empty cart.
                            </div>
                        @endif
                    </ul>

                    <div class="mt-8 flex justify-end border-t border-gray-100 pt-8">
                        <div class="w-screen max-w-lg space-y-4">
                            <dl class="space-y-0.5 text-sm text-gray-700">
                                <div class="flex justify-between">
                                    <dt>Subtotal</dt>
                                    <dd> ₹ {{ Cart::subtotal() }}</dd>
                                </div>

                                <div class="flex justify-between">
                                    <dt>Packaging</dt>
                                    <dd>₹100</dd>
                                </div>

                                {{-- <div class="flex justify-between">
                                    <dt>Discount</dt>
                                    <dd>-£20</dd>
                                </div> --}}

                                <div class="flex justify-between !text-base font-medium">
                                    <dt>Total</dt>
                                    <dd> ₹ {{ (float) str_replace(',', '', Cart::subtotal()) + 100 }}</dd>
                                </div>
                            </dl>
                            @if ($cartItemsCount != 0)
                                <div class="flex justify-end">
                                    <span
                                        class="inline-flex items-center justify-center rounded-full bg-indigo-100 px-2.5 py-0.5 text-indigo-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                                        </svg>

                                        <p class="whitespace-nowrap text-xs">1 Coupon Available</p>
                                    </span>
                                </div>

                                <div class="flex justify-end">
                                    <a href="{{ route('checkout') }}"
                                        class="block rounded bg-gray-700 px-5 py-3 text-sm text-gray-100 transition hover:bg-gray-600">
                                        Checkout
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('footer')


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const maxQty = 5;

            document.querySelectorAll(".increase-btn").forEach((btn, index) => {
                btn.addEventListener("click", function() {
                    const qtyInput = document.querySelectorAll("#qty")[index];
                    let currentValue = parseInt(qtyInput.value);
                    if (currentValue < maxQty) {
                        qtyInput.value = currentValue + 1;
                        let rowId = $(this).data('id');
                        let qty = qtyInput.value;
                        updateToCart(rowId, qty);
                    }
                });
            });

            document.querySelectorAll(".decrease-btn").forEach((btn, index) => {
                btn.addEventListener("click", function() {
                    const qtyInput = document.querySelectorAll("#qty")[index];
                    if (parseInt(qtyInput.value) > 1) {
                        qtyInput.value = parseInt(qtyInput.value) - 1;
                        let rowId = $(this).data('id');
                        let qty = qtyInput.value;
                        updateToCart(rowId, qty);
                    }
                });
            });
        });

        function updateToCart(rowId, qty) {
            $.ajax({
                url: '{{ route('updateToCart') }}',
                type: 'post',
                data: {
                    rowId: rowId,
                    qty: qty,
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        window.location.href = "{{ route('cartPage') }}"
                    }
                },
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
            });
        }

        function deleteItemsInCart(rowId) {
            Swal.fire({
                title: "Are you sure?",
                text: "If you click yes then item delete permenant!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#7e22ce",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('deleteCartItem') }}',
                        type: 'post',
                        data: {
                            rowId: rowId,
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == true) {
                                window.location.href = "{{ route('cartPage') }}";
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your item has been deleted.",
                                    icon: "success",
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            }
                        },
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                                "content"),
                        },
                    });
                }
            });

        }
    </script>

</body>

</html>
