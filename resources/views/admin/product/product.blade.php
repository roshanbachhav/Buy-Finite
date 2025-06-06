<!DOCTYPE html>
<html lang="en">

@extends('layouts.adminApp')

<body>
    @include('admin.sideMenu')
    <div class="p-4 sm:ml-64 bg-gradient-to-r from-indigo-200 via-pink-300 to-yellow-200">
        <div class="container">
            <div class="flex  items-center justify-start text-4xl ml-5 mt-5">
                Add Products.
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
                                <a href=""
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                    Product</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">add
                                    Product</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container mx-auto p-6">
            <form action="{{ route('postProduct') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div
                    class="container bg-gray-50 border border-gray-400 bg-opacity-30 backdrop-blur-lg rounded-2xl p-5 shadow-2xl">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div class="bg-white rounded-lg shadow-md p-6 bg-opacity-30 backdrop-blur-lg">
                            <h5 class="text-lg font-semibold mb-4">Product Details</h5>
                            <label for="title" class="block text-sm font-medium">Product Name :</label>
                            <input type="text"
                                class="w-full p-2 border border-gray-300 rounded-lg border-white/20 bg-white/10 backdrop-blur-md"
                                id="title" name="productName" value="{{ old('productName') }}" />
                            @error('productName')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror

                            <label for="message" class="block text-sm font-medium mt-4">Description</label>
                            <textarea id="description" rows="4"
                                class="w-full p-2 border border-gray-300 rounded-lg border-white/20 bg-white/10 backdrop-blur-md"
                                placeholder="Add description of products..." name="description">
                                {{ old('description') }}
                            </textarea>

                            @error('description')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="bg-white rounded-lg shadow-md p-6 bg-opacity-30 backdrop-blur-lg">
                            <h5 class="text-lg font-semibold mb-4">Product Pricing</h5>

                            <label for="listPrice" class="block text-sm font-medium">List Price :</label>
                            <input type="text"
                                class="w-full p-2 border border-gray-300 rounded-lg border-white/20 bg-white/10 backdrop-blur-md"
                                name="listPrice" id="listPrice" value="{{ old('listPrice') }}"
                                oninput="calculateDiscount()" />
                            @error('productName')
                                <p class="text-red-500">{{ $productName }}</p>
                            @enderror

                            <div class="my-5">
                                <label for="ourPrice" class="block text-sm font-medium">Our Price :</label>
                                <input type="text"
                                    class="w-full p-2 border border-gray-300 rounded-lg border-white/20 bg-white/10 backdrop-blur-md"
                                    name="ourPrice" id="ourPrice" value="{{ old('ourPrice') }}"
                                    oninput="calculateDiscount()" />
                                @error('ourPrice')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <label for="off" class="block text-sm font-medium mt-4">Discount (%):</label>
                            <input type="text"
                                class="w-full p-2 border border-gray-300 rounded-lg border-white/20 bg-white/10 backdrop-blur-md"
                                name="off" value="{{ old('off') }}" id="off" readonly />
                            @error('off')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6 ">
                        <div class="bg-white rounded-lg shadow-md p-6 bg-opacity-30 backdrop-blur-lg">
                            <h5 class="text-lg font-semibold mb-4">Products Image</h5>
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 border-white/20 bg-white/10 backdrop-blur-md"
                                    id="uploadText">Click to upload or drag and drop
                                </p>
                                <input class="hidden border-white/20 bg-white/10 backdrop-blur-md" type="file"
                                    id="dropzone-file" name="productImage" value="{{ old('productImage') }}"
                                    required />
                                @error('productImage')
                                    <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            </label>
                        </div>

                        <div class="bg-white rounded-lg shadow-md p-6 bg-opacity-30 backdrop-blur-lg">
                            <h5 class="text-lg font-semibold mb-4">Image Preview</h5>
                            <div id="imagePreview"
                                class="w-full h-64 shadow-xl rounded-lg flex items-center justify-center overflow-hidden">
                                <img id="previewImg" src="/Images/web-img/buyfinite-logo.png" alt="Image Preview"
                                    class="object-cover w-full h-full" />
                            </div>
                        </div>

                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                        <div class="bg-white rounded-lg shadow-md p-6 bg-opacity-30 backdrop-blur-lg">
                            <h5 class="text-lg font-semibold mb-4">Categories, Sub Categories & Brands</h5>
                            <label for="category" class="block text-sm font-medium">Select Category</label>
                            <select name="category_id" id="category_id"
                                class="w-full p-2 border border-gray-300 rounded-lg mt-2 border-white/20 bg-white/10 backdrop-blur-md">
                                <option value="" disabled selected>Select one category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror

                            <label for="sub-cat" class="block text-sm font-medium mt-4">Sub Category :</label>
                            <select name="subcategory" id="subcategory"
                                class="w-full p-2 border border-gray-300 rounded-lg mt-2 border-white/20 bg-white/10 backdrop-blur-md">
                                <option value="" disabled selected>Under Maintainance</option>
                                <option value=""></option>
                            </select>
                            @error('productName')
                                <p class="text-red-500">{{ $productName }}</p>
                            @enderror

                            <label for="brand" class="block text-sm font-medium">Select Brand</label>
                            <select name="brand_id" id="brand_id"
                                class="w-full p-2 border border-gray-300 rounded-lg mt-2 border-white/20 bg-white/10 backdrop-blur-md">
                                <option value="" disabled selected>Select one brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="bg-white rounded-lg shadow-md p-6 bg-opacity-30 backdrop-blur-lg">
                            <h5 class="text-lg font-semibold mb-4">Rating</h5>
                            <label for="starRating" class="block text-sm font-medium">Star Rating</label>
                            <select name="starRating"
                                class="w-full text-yellow-500 p-2 border border-gray-300 rounded-lg mt-2 border-white/20 bg-white/10 backdrop-blur-md">
                                <option value="1" class="text-yellow-500">★</option>
                                <option value="2" class="text-yellow-500">★★</option>
                                <option value="3" class="text-yellow-500">★★★</option>
                                <option value="4" class="text-yellow-500">★★★★</option>
                                <option value="5" class="text-yellow-500">★★★★★</option>
                            </select>
                            <label for="linkOfCompany" class="block text-sm font-medium mt-4">Feature or not :</label>
                            <select name="featured" id="featured"
                                class="w-full p-2 border border-gray-300 rounded-lg mt-2 border-white/20 bg-white/10 backdrop-blur-md">
                                <option value="" disabled selected>Select For Featured Products</option>
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit"
                        class="mt-6 w-full bg-[#932280] text-white py-2 rounded-lg hover:bg-[#742d86]">
                        Save This Product
                    </button>
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
