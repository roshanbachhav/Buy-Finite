<!DOCTYPE html>
<html lang="en">

@extends('layouts.adminApp')

<body>
    @include('admin.sideMenu')
    <div class="p-4 sm:ml-64 bg-gradient-to-r from-pink-200 via-orange-300 to-yellow-200">
        <div class="container">
            <div class="flex  items-center justify-start text-4xl ml-5 mt-5">
                Edit <span class="text-[#c93eb2] font-semibold mx-2">{{ $brands->brand_name }}</span> Brand Details.
            </div>
            <div class=" flex items-center justify-start text-4xl my-3 ml-5">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href=""
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12"
                                    height="12" color="#000000" fill="none" class="mx-1">
                                    <circle cx="17.75" cy="6.25" r="4.25" stroke="currentColor"
                                        stroke-width="1.5" />
                                    <circle cx="6.25" cy="6.25" r="4.25" stroke="currentColor"
                                        stroke-width="1.5" />
                                    <circle cx="17.75" cy="17.75" r="4.25" stroke="currentColor"
                                        stroke-width="1.5" />
                                    <circle cx="6.25" cy="17.75" r="4.25" stroke="currentColor"
                                        stroke-width="1.5" />
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li class="inline-flex items-center">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <a href="{{ route('productList') }}"
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                    Brands List</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Edit
                                    Brand</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container mx-auto p-6">
            <form action="{{ route('postEditBrands', $brands->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div
                    class="relative flex flex-col w-full h-full text-gray-700 bg-white bg-opacity-30 backdrop-blur-lg border-2 border-white border-opacity-20 rounded-xl">
                    <div class="my-4 pr-10">
                        <div class="grid grid-cols-3 gap-4 mb-5 space-y-3">
                            <div class="flex items-center col-span-1">
                                <label for="brand_name" class="text-black p-2 ml-10">Brand Name</label>
                            </div>
                            <div class="col-span-2">
                                <input type="text" name="brand_name" id="brand_name"
                                    value="{{ old('brand_name', $brands->brand_name) }}"
                                    class="p-2 rounded-xl w-full border border-white/20 bg-white/10 backdrop-blur-md"
                                    placeholder="Brand name like: Electronics, etc...">
                                @error('brand_name')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center col-span-1">
                                <label for="brand_description" class="text-black p-2 ml-10">Brand
                                    Description</label>
                            </div>
                            <div class="col-span-2">
                                <textarea id="description" name="brand_description" value="{{ old('brand_description', $brands->brand_description) }}"
                                    class="p-2 rounded-xl w-full border border-white/20 bg-white/10 backdrop-blur-md"
                                    placeholder="Write about Brand...">{{ old('brand_description', $brands->brand_description) }}</textarea>
                                @error('brand_description')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center col-span-1">
                                <label for="Brand URL" class="text-black p-2 ml-10">Brand URL</label>
                            </div>
                            <div class="col-span-2">
                                <input type="text" name="burl" id="Brand URL"
                                    value="{{ old('burl', $brands->burl) }}"
                                    class="p-2 rounded-xl w-full border border-white/20 bg-white/10 backdrop-blur-md"
                                    placeholder="Enter Brand URL of the Brand">
                                @error('burl')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center col-span-1">
                                <label for="status" class="text-black p-2 ml-10">Status</label>
                            </div>
                            <div class="col-span-2">
                                <select id="status" name="status"
                                    class="p-2 rounded-xl w-full border border-white/20 bg-white/10 backdrop-blur-md">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                @error('status')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 my-6">
                            <div class="flex items-center justify-start">
                                <label for="Brand URL" class="text-black col-span-1 p-2 ml-10">Brand
                                    Logo</label>
                            </div>

                            <div
                                class="p-3 flex flex-col sm:flex-row col-span-2 items-center justify-start space-y-3 sm:space-y-0 sm:space-x-4 border border-gray-300 rounded-xl  border-white/20 bg-white/10 backdrop-blur-md">
                                <div class="col-span-1">
                                    <img class="h-auto w-24 rounded-lg shadow-lg"
                                        src="{{ asset('images/brand_img/' . $brands->brand_logo) }}"
                                        id="image-preview" alt="image description">
                                </div>

                                <div class="flex flex-col items-start">
                                    <label for="image" class="text-base font-semibold text-black">Pick the image
                                        of
                                        Brand Logo</label>
                                    <label for="image"
                                        class="text-xs font-semibold text-gray-700 uppercase my-1">png,
                                        jpg,
                                        jpeg, svg...</label>

                                    <div class="flex items-center justify-start w-full p-3 border border-gray-300 rounded-lg shadow-sm cursor-pointer hover:border-blue-400"
                                        id="image-upload-box">
                                        <img id="image-preview" class="h-12 w-12 rounded-full object-cover hidden"
                                            src="" alt="Image preview">
                                        <span id="upload-text" class="text-gray-500 ml-3">Click to upload
                                            image</span>
                                        <input type="file" name="brand_logo" id="image" class="hidden"
                                            onchange="previewImage(event)">
                                        @error('image')
                                            <p class="text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-9">
                        <div class="grid grid-cols-3 sm:grid-cols-3 gap-6 my-6">
                            <div class="col-span-1"></div>

                            <button type="submit"
                                class="col-span-1 bg-[#932280] text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-[#742d86] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200">
                                Submit
                            </button>
                            <div class="col-span-1"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>


    <script>
        document.getElementById('dropzone-file').addEventListener('change', function() {
            var file = this.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('previewImg').setAttribute('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });


        document.getElementById('dropzone-file').addEventListener('change', function() {
            const fileInput = this;
            const uploadText = document.getElementById('uploadText');

            if (fileInput.files.length > 0) {
                const fileName = fileInput.files[0].name;
                uploadText.textContent = `Selected: ${fileName}`;
            } else {
                uploadText.textContent = "Click to upload or drag and drop";
            }
        });

        function calculateDiscount() {
            let listPrice = parseFloat(document.getElementById('listPrice').value);
            let ourPrice = parseFloat(document.getElementById('ourPrice').value);

            if (listPrice > 0 && ourPrice > 0 && ourPrice < listPrice) {
                let discount = ((listPrice - ourPrice) / listPrice) * 100;
                document.getElementById('off').value = discount.toFixed(2);
            } else {
                document.getElementById('off').value = 0;
            }
        }
    </script>
</body>

</html>
