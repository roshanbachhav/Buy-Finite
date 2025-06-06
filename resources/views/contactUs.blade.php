<!DOCTYPE html>
<html lang="en">
@extends('layouts.head')

<body>
    @include('navbar')

    <section class="z-50 relative mt-16 py-10 px-6 bg-gradient-to-br from-gray-50 via-white to-gray-100" id="app">
        <div
            class="relative z-10 overflow-hidden bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl ring-0 ring-gray-200">
            <div class="grid md:grid-cols-2 gap-10 items-start overflow-hidden">
                <div
                    class="relative w-full px-8 py-12 rounded-xl overflow-hidden bg-gradient-to-br from-white/30 to-white/10 backdrop-blur-xl">

                    <div class="absolute -top-20 -left-20 w-96 h-96 bg-blue-400 opacity-20 rounded-full blur-[120px]">
                    </div>
                    <div
                        class="absolute bottom-0 right-0 w-80 h-80 bg-purple-900 opacity-20 rounded-full blur-[100px] translate-x-1/3 translate-y-1/3">
                    </div>

                    <svg aria-hidden="true" class="absolute inset-0 w-full h-full">
                        <defs>
                            <pattern id="pattern-bg" x="0" y="0" width="200" height="200"
                                patternUnits="userSpaceOnUse">
                                <path d="M130 200V.5M.5 .5H200" fill="none" stroke="#e0e0e0" stroke-width="1" />
                            </pattern>
                        </defs>
                        <rect fill="url(#pattern-bg)" width="100%" height="100%" />
                    </svg>

                    <div class="relative z-10 space-y-6 p-10">
                        <h2 class="text-7xl font-bold text-black">Get in Touch</h2>
                        <h3 class="text-3xl font-bold text-black">Welcome to BuyFinite</h3>
                        <p class="mt-4 text-black text-lg leading-relaxed">
                            Got a question? Stuck with something? Or just want to say hi? You're in the right place!
                            😊<br><br>
                            We're here to make your BuyFinite experience easy and stress-free.
                            Got a question, feedback, or need help with something? Just send us a message below — we’ll
                            get
                            back to you soon.
                            Real people. Real help. Always happy to assist!

                        </p>

                        <div class="flex items-start space-x-4">
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon"
                                class="ps tt bbm">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z">
                                </path>
                            </svg>
                            <p class="text-black">Malabh Rh 05, Amruta Nagar, Nashik, Maharastra, India</p>
                        </div>

                        <div class="flex items-start space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-hourglass-icon lucide-hourglass">
                                <path d="M5 22h14" />
                                <path d="M5 2h14" />
                                <path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22" />
                                <path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2" />
                            </svg>
                            <p class="text-black"><strong>Support Hours:</strong> Monday – Friday, 9:00 AM – 6:00 PM
                                (GMT)</p>

                        </div>

                        <div class="flex items-start space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-send-icon lucide-send">
                                <path
                                    d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z" />
                                <path d="m21.854 2.147-10.94 10.939" />
                            </svg>
                            <p class="text-black">bachhavroshan600@gmail.com</p>
                        </div>


                        <p class="text-sm text-gray-500 mt-4">
                            By submitting this form, I agree to the <a href="#"
                                class="text-blue-500 underline hover:text-blue-700">privacy policy</a>.
                        </p>
                    </div>
                </div>

                <form id="changePasswordForm" action="{{ route('contact.us.formSubmission') }}" method="POST"
                    class="space-y-6 w-full p-5">
                    @csrf
                    <div class="flex flex-col md:flex-row md:space-x-3 md:space-y-0 items-start">
                        <div class="w-full">
                            <label class="block text-black font-semibold mb-2">First Name</label>
                            <input type="text" name="firstName"
                                class="form-input w-full px-5 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="John">
                            <p id="error-firstName" class="text-sm text-red-600 mt-1"></p>
                        </div>
                        <div class="w-full">
                            <label class="block text-black font-semibold mb-2">Last Name</label>
                            <input type="text" name="lastName"
                                class="form-input w-full px-5 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Doe">
                            <p id="error-lastName" class="text-sm text-red-600 mt-1"></p>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row md:space-x-3 md:space-y-0 items-start">
                        <div class="w-full">
                            <label class="block text-black font-semibold mb-2">Email</label>
                            <input type="email" name="email"
                                class="form-input w-full px-5 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="you@example.com">
                            <p id="error-email" class="text-sm text-red-600 mt-1"></p>
                        </div>

                        <div class="w-full">
                            <label class="block text-black font-semibold mb-2">Phone</label>
                            <input type="text" name="phoneNo"
                                class="form-input w-full px-5 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="+91 234 567 890 1">
                            <p id="error-phoneNo" class="text-sm text-red-600 mt-1"></p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-black font-semibold mb-2">Subject</label>
                        <input type="text" name="subject"
                            class="form-input w-full px-5 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter proper subject">
                        <p id="error-subject" class="text-sm text-red-600 mt-1"></p>
                    </div>

                    <div>
                        <label class="block text-black font-semibold mb-2">Message</label>
                        <textarea rows="5" name="message"
                            class="form-input w-full px-5 py-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Write your message here..."></textarea>
                        <p id="error-message" class="text-sm text-red-600 mt-1"></p>
                    </div>

                    <div class="flex flex-col">
                        <button type="submit"
                            class="relative w-64 h-16 rounded-lg my-5 text-white text-2xl bg-green-500 border-2 border-black overflow-hidden transition-all duration-500 hover:shadow-2xl group flex items-center justify-center gap-2">
                            <span class="relative text-lg z-10 transition-all duration-500 group-hover:text-black">
                                Send Message
                            </span>
                            <span
                                class="flex justify-end items-center absolute inset-0 bg-white w-0 group-hover:w-full transition-all duration-500 ease-out">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-send-horizontal-icon lucide-send-horizontal mr-3">
                                    <path
                                        d="M3.714 3.048a.498.498 0 0 0-.683.627l2.843 7.627a2 2 0 0 1 0 1.396l-2.842 7.627a.498.498 0 0 0 .682.627l18-8.5a.5.5 0 0 0 0-.904z" />
                                    <path d="M6 12h16" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @include('footer')


    <script>
        document.querySelector('#changePasswordForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            document.querySelectorAll('input, textarea').forEach(input => {
                input.classList.remove('border-red-500');
                input.classList.add('border-white');
            });

            document.querySelectorAll('p[id^="error-"]').forEach(p => p.textContent = '');

            const form = e.target;
            const newForm = new FormData(form);
            const response = await fetch(form.action, {
                method: "POST",
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: newForm
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
                window.location.href = "{{ route('home') }}"
            }

        })
    </script>
</body>

</html>
