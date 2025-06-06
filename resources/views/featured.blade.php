<div class="container my-10 rounded-xl border shadow-lg">
    <div class="flex justify-between items-center">
        <div class="mb-2">
            <h1 class="text-3xl font-semibold mt-5 ml-3">Featured Products</h1>
            <p class="mb-2 ml-3">Top featured product in BuyFinite</p>
        </div>
        <a href="" class="flex">
            <button
                class="relative w-44 h-12 rounded-lg my-5 text-white text-2xl bg-black border-2 border-black overflow-hidden transition-all duration-500 hover:shadow-2xl group flex items-center justify-center gap-2">
                <span class="relative text-lg z-10 transition-all duration-500 group-hover:text-black">
                    Show More
                </span>
                <span
                    class="flex justify-end items-center absolute inset-0 bg-white w-0 group-hover:w-full transition-all duration-500 ease-out">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="25" height="25"
                        color="#000000" fill="none" class="mr-2">
                        <path d="M12.5 18C12.5 18 18.5 13.5811 18.5 12C18.5 10.4188 12.5 6 12.5 6" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M5.50005 18C5.50005 18 11.5 13.5811 11.5 12C11.5 10.4188 5.5 6 5.5 6"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg></span>
            </button>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 p-6">
        @foreach ($featuredProducts as $f)
            <div
                class="relative flex flex-col bg-white shadow-lg border border-slate-200 rounded-lg overflow-hidden transition-all duration-200 hover:shadow-2xl hover:shadow-gray-900">
                <div class="relative h-96 overflow-hidden">
                    <a href="{{ route('productOverview', $f->id) }}" class="block w-full h-full">

                        <img src="{{ asset('images/product_img/' . $f->productImage) }}" alt="card-image"
                            class="h-full w-full object-cover" loading="lazy" />

                        <div
                            class="absolute bottom-4 left-4 right-4 bg-white/20 backdrop-blur-md text-black p-3 rounded-lg border border-white/30 shadow-md">
                            <p class="text-lg font-semibold">{{ $f->productName }}</p>
                            <p class="text-lg font-semibold">{{ $f->ourPrice }}</p>
                            <div class="flex items-center mt-1 space-x-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $f->starRating)
                                        <span class="text-yellow-400 text-lg">★</span>
                                    @else
                                        <span class="text-gray-300 text-lg">★</span>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
