<!DOCTYPE html>
<html lang="en">

@extends('layouts.adminApp')

<body>
    @include('admin.sideMenu')
    <div class="p-4 sm:ml-64 bg-gradient-to-r from-pink-200 via-orange-300 to-yellow-200">
        <div class="container mx-5">
            <div class="border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                    <li class="me-2">
                        <button onclick="showSection('brandList')" id="tab-brandList"
                            class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg hover:text-gray-600 dark:hover:text-gray-300 dark:border-blue-500 group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="mx-2 lucide lucide-list-tree">
                                <path d="M21 12h-8" />
                                <path d="M21 6H8" />
                                <path d="M21 18h-8" />
                                <path d="M3 6v4c0 1.1.9 2 2 2h3" />
                                <path d="M3 10v6c0 1.1.9 2 2 2h3" />
                            </svg>
                            Show Brand List
                        </button>
                    </li>

                    <li class="me-2">
                        <button onclick="showSection('addBrand')" id="tab-addBrand"
                            class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="mx-2 lucide lucide-star">
                                <path
                                    d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z" />
                            </svg>
                            Add Brands
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container mx-auto p-6">
            <div class="container my-2">
                @session('success')
                    <div id="alert-3"
                        class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                        role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            {{ Session::get('success') }}
                        </div>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                            data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endsession
            </div>
            <div id="brandList" class="mt-5 hidden">
                @include('admin.brands.brandList')
            </div>

            <div id="addBrand" class="mt-5">
                @include('admin.brands.addBrands')
            </div>

        </div>

    </div>


    <script>
        function showSection(sectionId) {
            document.getElementById('brandList').classList.add('hidden');
            document.getElementById('addBrand').classList.add('hidden');

            document.getElementById('tab-brandList').classList.remove('text-blue-600', 'border-blue-600');
            document.getElementById('tab-addBrand').classList.remove('text-blue-600', 'border-blue-600');

            document.getElementById(sectionId).classList.remove('hidden');

            document.getElementById(`tab-${sectionId}`).classList.add('text-blue-600', 'border-blue-600');
        }

        showSection('brandList');


        function previewImage(event) {
            const preview = document.getElementById("image-preview");
            const uploadText = document.getElementById("upload-text");
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                uploadText.textContent = file.name;
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>
