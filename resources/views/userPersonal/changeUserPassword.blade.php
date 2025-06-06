<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<body>
    @include('navbar')
    @include('layouts.profile')
    <div class="mt-16">
        <div class="p-4 sm:ml-64 mt-15">
            <div class="flex items-center justify-center bg-gray-50 p-16">
                <div class="w-full max-w-xl space-y-8 bg-white p-8 rounded-xl shadow-md">
                    @if ($next_change_at && now()->lt($next_change_at))
                        <div id="password-warning"
                            class="flex items-center gap-2 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-md mb-6">
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.366-.446.972-.446 1.338 0l6.518 7.95c.329.402.056 1.002-.47 1.002H2.209c-.526 0-.798-.6-.47-1.002l6.518-7.95zM11 13a1 1 0 10-2 0 1 1 0 002 0zm-.293-2.707a1 1 0 00-1.414 0L9 10.586l-.293-.293a1 1 0 00-1.414 1.414L7.586 12l-.293.293a1 1 0 001.414 1.414L9 13.414l.293.293a1 1 0 001.414-1.414L10.414 12l.293-.293a1 1 0 000-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>
                                You can change your password again in
                                <span id="countdown" class="font-semibold"></span>.
                            </span>
                        </div>
                    @endif
                    <div>
                        <h2 class="text-center text-2xl font-bold text-gray-800">Change
                            {{ explode(' ', trim($user->name))[0] ?? '' }} Password
                        </h2>
                        <p class="mt-2 text-center text-sm text-gray-500">Please enter your current and new password
                            below</p>
                    </div>

                    <form action="{{ route('change.password') }}" id="changePasswordForm" method="POST"
                        class="space-y-6">
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
                            <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm New
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
                Swal.fire({
                    title: "Successful!",
                    text: result.message,
                    icon: "success"
                });
                form.reset();
                window.location.href = "{{ route('userProfile') }}"
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const nextChangeAt = @json($next_change_at);
            const updateBtn = document.querySelector('#changePasswordForm button[type="submit"]');
            const countdown = document.getElementById('countdown');

            if (nextChangeAt && updateBtn && countdown) {
                const targetTime = new Date(nextChangeAt).getTime();

                const interval = setInterval(() => {
                    const now = new Date().getTime();
                    const distance = targetTime - now;

                    if (distance <= 0) {
                        clearInterval(interval);
                        document.getElementById('password-warning')?.remove();
                        updateBtn.disabled = false;
                        updateBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
                        updateBtn.classList.add('bg-black', 'hover:bg-gray-900');
                        countdown.textContent = '';
                    } else {
                        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        countdown.textContent = `${days}d ${hours}h ${minutes}m ${seconds}s`;

                        updateBtn.disabled = true;
                        updateBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
                        updateBtn.classList.remove('bg-black', 'hover:bg-gray-900');
                    }
                }, 1000);
            }
        });
    </script>
</body>

</html>
