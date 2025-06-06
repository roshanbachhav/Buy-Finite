<form action="{{ route('postBrands') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div
        class="relative flex flex-col w-full h-full text-gray-700 bg-white bg-opacity-30 backdrop-blur-lg border-2 border-white border-opacity-20 rounded-xl">
        <div class="my-4 pr-10">
            <div class="grid grid-cols-3 gap-4 mb-5 space-y-3">
                <div class="flex items-center col-span-1">
                    <label for="brand_name" class="text-black p-2 ml-10">Brand Name</label>
                </div>
                <div class="col-span-2">
                    <input type="text" name="brand_name" id="brand_name" value="{{ old('brand_name') }}"
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
                    <textarea id="description" name="brand_description" value="{{ old('brand_description') }}"
                        class="p-2 rounded-xl w-full border border-white/20 bg-white/10 backdrop-blur-md"
                        placeholder="Write about Brand...">{{ old('brand_description') }}</textarea>
                    @error('brand_description')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center col-span-1">
                    <label for="Brand URL" class="text-black p-2 ml-10">Brand URL</label>
                </div>
                <div class="col-span-2">
                    <input type="text" name="burl" id="Brand URL" value="{{ old('burl') }}"
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
                    class="p-3 flex flex-col sm:flex-row col-span-2 items-center justify-start space-y-3 sm:space-y-0 sm:space-x-4 border border-gray-300 rounded-xl border-white/20 bg-white/10 backdrop-blur-md">
                    <div class="col-span-1">
                        <img class="h-auto w-24 rounded-lg shadow-lg" src="/Images/web-img/buyfinite-logo.png"
                            id="image-preview" alt="image description">
                    </div>

                    <div class="flex flex-col items-start">
                        <label for="image" class="text-base font-semibold text-black">Pick the image
                            of
                            Brand Logo</label>
                        <label for="image" class="text-xs font-semibold text-gray-700 uppercase my-1">png,
                            jpg,
                            jpeg, svg...</label>

                        <div class="flex items-center justify-start w-full p-3 border border-gray-300 rounded-lg shadow-sm cursor-pointer hover:border-blue-400"
                            id="image-upload-box">
                            <img id="image-preview" class="h-12 w-12 rounded-full object-cover hidden" src=""
                                alt="Image preview">
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
