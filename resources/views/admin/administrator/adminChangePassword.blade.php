<!DOCTYPE html>
<html lang="en">
@extends('layouts.adminApp')

<body>
    @include('admin.sideMenu')
    <div class="sm:ml-64">
        <div class="">
            <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
                aria-hidden="true">
                <div class="relative left-1/2 -z-10 aspect-1155/678 w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div id="toast-container" class="fixed top-5 right-5 z-50 space-y-3 w-80">
                <div class="toast-template hidden">
                    <div
                        class="flex items-start p-4 rounded-lg shadow-lg border-l-4 transform transition-all duration-300 translate-x-full">
                        <div class="toast-icon flex-shrink-0 w-6 h-6 mt-0.5"></div>
                        <div class="ml-3 flex-1">
                            <p class="text-sm font-medium toast-message"></p>
                        </div>
                        <button class="ml-4 close-btn opacity-70 hover:opacity-100 transition-opacity">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="p-4">
                    <div class="flex items-center justify-center bg-gray-50 p-16">
                        <div class="w-full max-w-xl space-y-8 bg-white p-8 rounded-xl shadow-md">
                            <div>
                                <h2 class="text-center text-2xl font-bold text-gray-800">Change
                                    admin password
                                </h2>
                                <p class="mt-2 text-center text-sm text-gray-500">Please enter your current and new
                                    password
                                    below</p>
                            </div>

                            <form action="{{ route('admin.postChangePassword') }}" id="changePasswordForm"
                                method="POST" class="space-y-6">
                                @csrf

                                <div>
                                    <label for="old_password" class="block text-sm font-medium text-gray-700">Old
                                        Password</label>
                                    <input type="password" name="old_password" id="old_password"
                                        class="form-input mt-1 block w-full rounded-md border border-gray-300 shadow-sm p-2 text-sm placeholder-gray-400">
                                    <p id="error-old_password" class="text-sm text-red-600 mt-1"></p>
                                </div>


                                <div>
                                    <label for="new_password" class="block text-sm font-medium text-gray-700">New
                                        Password</label>
                                    <input type="password" name="new_password" id="new_password"
                                        class="form-input mt-1 block w-full rounded-md border border-gray-300 shadow-sm p-2 text-sm placeholder-gray-400">
                                    <p id="error-new_password" class="text-sm text-red-600 mt-1"></p>
                                </div>

                                <div>
                                    <label for="confirm_password"
                                        class="block text-sm font-medium text-gray-700">Confirm New
                                        Password</label>
                                    <input type="password" name="confirm_password" id="confirm_password"
                                        class="form-input mt-1 block w-full rounded-md border border-gray-300 shadow-sm p-2 text-sm placeholder-gray-400">
                                    <p id="error-confirm_password" class="text-sm text-red-600 mt-1"></p>
                                </div>

                                <div>
                                    <button type="submit"
                                        class="w-full flex justify-center items-center rounded-md bg-black px-4 py-2 text-white text-sm font-medium transition hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-black">
                                        Update Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('#changePasswordForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            document.querySelectorAll('.form-input').forEach(input => {
                input.classList.remove('border-red-500');
                input.classList.add('border-gray-300');
            });
            document.querySelectorAll('p[id^="error-"]').forEach(p => p.textContent = '');

            const form = e.target;
            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            });

            const result = await response.json();

            if (!result.status) {
                for (const field in result.errors) {
                    const input = document.querySelector(`[name="${field}"]`);
                    const error = document.getElementById(`error-${field}`);
                    if (input) input.classList.add('border-red-500');
                    if (error) error.textContent = result.errors[field][0];
                }
            } else {
                // alert(result.message);
                Swal.fire({
                    title: "Successful!",
                    text: result.message,
                    icon: "success"
                });
                form.reset();
                window.location.href = "{{ route('dashboard') }}"
            }
        });
    </script>

    @livewireScripts
</body>

</html>
