<div class="">

    <div
        class="relative flex flex-col w-full h-full text-gray-700 bg-white bg-opacity-30 backdrop-blur-lg border-2 border-white border-opacity-20 rounded-xl">
        <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 rounded-none bg-clip-border">
            <div class="flex flex-col justify-between gap-8 mb-4 md:flex-row md:items-center">
                <div>
                    <h5
                        class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Current Brands Added
                    </h5>
                    <p class="block mt-1 font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
                        This is current top 5 brands
                    </p>
                </div>
                <div class="flex w-full gap-2 shrink-0 md:w-max">
                    <div class="w-full md:w-72">
                        <div class="relative h-10 w-full min-w-[200px]">
                            <div
                                class="absolute grid w-5 h-5 top-2/4 right-3 -translate-y-2/4 place-items-center text-blue-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                    </path>
                                </svg>
                            </div>
                            <input id="inputText"
                                class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-gray-500 bg-transparent px-3 py-2.5 !pr-9 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                placeholder=" " />
                            <label
                                class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                Search
                            </label>
                        </div>
                    </div>
                    <button onclick="showSection('addBrand')"
                        class="h-10 flex select-none items-center gap-3 rounded-lg bg-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"
                            color="#fff" fill="none">
                            <path
                                d="M9.87868 20.1214C10.7574 21.0001 12.1716 21.0001 15 21.0001C17.8284 21.0001 19.2426 21.0001 20.1213 20.1214C21 19.2428 21 17.8285 21 15.0001C21 12.1717 21 10.7575 20.1213 9.8788C19.2426 9.00012 17.8284 9.00012 15 9.00012C12.1716 9.00012 10.7574 9.00012 9.87868 9.8788C9 10.7575 9 12.1717 9 15.0001C9 17.8285 9 19.2428 9.87868 20.1214Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M17.9239 9.00012C17.828 8.02504 17.6112 7.36869 17.1213 6.8788C16.2426 6.00012 14.8284 6.00012 12 6.00012C9.17157 6.00012 7.75736 6.00012 6.87868 6.8788C6 7.75748 6 9.17169 6 12.0001C6 14.8285 6 16.2428 6.87868 17.1214C7.36857 17.6113 8.02491 17.8281 9 17.924"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M14.9239 6.00012C14.828 5.02504 14.6112 4.36869 14.1213 3.8788C13.2426 3.00012 11.8284 3.00012 9 3.00012C6.17157 3.00012 4.75736 3.00012 3.87868 3.8788C3 4.75748 3 6.17169 3 9.00012C3 11.8285 3 13.2428 3.87868 14.1214C4.36857 14.6113 5.02491 14.8281 6 14.924"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        Add Brands
                    </button>
                </div>
            </div>
        </div>
        <div class="px-0 overflow-x-hidden">
            <table class="w-full text-left table-auto min-w-max">
                <thead>
                    <tr>
                        <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Id
                            </p>
                        </th>
                        <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                About Brands
                            </p>
                        </th>
                        <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Description
                            </p>
                        </th>
                        <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Date
                            </p>
                        </th>
                        <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Status
                            </p>
                        </th>
                        <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                URL
                            </p>
                        </th>
                        <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Action
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($brands->isNotEmpty())
                        @foreach ($brands as $b)
                            <tr>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $b->id }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ asset('images/brand_img/' . $b->brand_logo) }}" alt="brands-images"
                                            class="relative inline-block h-12 w-12 !rounded-full border border-blue-gray-50 bg-blue-gray-50/50 object-contain object-center p-1" />
                                        <p
                                            class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">
                                            {{ $b->brand_name }}
                                        </p>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ \Illuminate\Support\Str::words($b->brand_description, 5, '...') }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $b->created_at->format('d M, Y') }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="w-max">
                                        <div
                                            class="relative grid items-center px-2 py-1 font-sans text-xs font-bold uppercase rounded-md select-none whitespace-nowrap 
                                    {{ $b->status === 1 ? 'bg-green-500/20 text-green-900' : 'bg-amber-500/20 text-amber-900' }}">
                                            <span>{{ $b->status === 1 ? 'Active' : 'Inactive' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50 w-52">
                                    <div class="flex items-center gap-3 w-52">
                                        <a href="{{ $b->burl }}" target="_blank" class="text-blue-500">
                                            {{ \Illuminate\Support\Str::limit($b->burl, 20, '...') }}
                                        </a>
                                    </div>
                                </td>

                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="px-2 py-4 flex items-center space-x-1 justify-start">
                                        <a href="{{ route('getBrandsEdit', $b->id) }}"
                                            class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="button">
                                            <span
                                                class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    width="14" height="14" fill="currentColor"
                                                    aria-hidden="true">
                                                    <path
                                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </a>
                                        <form method="POST" action="{{ route('deleteBrand', $b->id) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline flex items-center">
                                            @method('delete')
                                            @csrf
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    width="18" height="18" color="#000000" fill="none">
                                                    <path
                                                        d="M19.5 5.5L18.8803 15.5251C18.7219 18.0864 18.6428 19.3671 18.0008 20.2879C17.6833 20.7431 17.2747 21.1273 16.8007 21.416C15.8421 22 14.559 22 11.9927 22C9.42312 22 8.1383 22 7.17905 21.4149C6.7048 21.1257 6.296 20.7408 5.97868 20.2848C5.33688 19.3626 5.25945 18.0801 5.10461 15.5152L4.5 5.5"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                    <path
                                                        d="M3 5.5H21M16.0557 5.5L15.3731 4.09173C14.9196 3.15626 14.6928 2.68852 14.3017 2.39681C14.215 2.3321 14.1231 2.27454 14.027 2.2247C13.5939 2 13.0741 2 12.0345 2C10.9688 2 10.436 2 9.99568 2.23412C9.8981 2.28601 9.80498 2.3459 9.71729 2.41317C9.32164 2.7167 9.10063 3.20155 8.65861 4.17126L8.05292 5.5"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="p-4 text-red-700 border-b border-blue-gray-50">
                                <p>Opps! No Brands are add from the admin</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
            <a href="{{ $brands->previousPageUrl() }}">
                <button
                    class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button" {{ $brands->onFirstPage() ? 'disabled' : '' }} wire:click="previousPage">
                    Previous
                </button>
            </a>

            <div class="flex flex-col items-center gap-2 paginate-integers">
                {{ $brands->links() }}
            </div>

            <a href="{{ $brands->nextPageUrl() }}">
                <button
                    class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button" {{ $brands->hasMorePages() ? '' : 'disabled' }} wire:click="nextPage">
                    Next
                </button>
            </a>
        </div>
    </div>
</div>

<script>
    document.getElementById('inputText').addEventListener('input', function(e) {
        const term = e.target.value.toLowerCase();
        document.querySelectorAll('tbody tr').forEach(rows => {
            const text = rows.textContent.toLowerCase();
            rows.style.display = text.includes(term) ? "" : "none";
        });
    })
</script>
