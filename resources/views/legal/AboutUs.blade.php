<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Buy Finite - Privacy and Policy</title>
    <link rel="stylesheet" th:href="@{/css/legal.css}" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body class="bg-gray-50 text-gray-800 font-sans antialiased">
    @include('navbar')

    <section class="text-center py-16 bg-white shadow">
        <h1 class="text-5xl font-extrabold text-indigo-700 mb-4">Creator & Developer</h1>
        <p class="text-lg text-gray-600">Welcome to Buy Finite. Scroll down to meet the Developer.</p>
    </section>

    <section class="max-w-7xl mx-auto px-6 py-16 flex flex-col lg:flex-row items-center gap-10">
        <div class="flex-1 flex justify-center">
            <div class="relative w-80 h-80">
                <svg id="sw-js-blob-svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" version="1.1">
                    <defs>
                        <linearGradient id="sw-gradient" x1="0" x2="1" y1="1" y2="0">
                            <stop id="stop1" stop-color="rgba(248, 117, 55, 1)" offset="0%"></stop>
                            <stop id="stop2" stop-color="rgba(251, 168, 31, 1)" offset="100%"></stop>
                        </linearGradient>
                    </defs>
                    <mask id="mask1" mask-type="alpha">
                        <path fill="url(#sw-gradient)"
                            d="M29.6,0.9C29.6,16.4,14.8,32.8,-0.3,32.8C-15.4,32.8,-30.8,16.4,-30.8,0.9C-30.8,-14.6,-15.4,-29.3,-0.3,-29.3C14.8,-29.3,29.6,-14.6,29.6,0.9Z"
                            width="100%" height="100%" transform="translate(50 50)" stroke-width="0"
                            style="transition: all 0.3s ease 0s;">
                        </path>
                    </mask>
                    <g mask="url(#mask1)">
                        <path fill="url(#sw-gradient)"
                            d="M29.6,0.9C29.6,16.4,14.8,32.8,-0.3,32.8C-15.4,32.8,-30.8,16.4,-30.8,0.9C-30.8,-14.6,-15.4,-29.3,-0.3,-29.3C14.8,-29.3,29.6,-14.6,29.6,0.9Z"
                            width="100%" height="100%" transform="translate(50 50)" stroke-width="0"
                            style="transition: all 0.3s ease 0s;">
                        </path>
                        <image href="/images/no_background_Prof.png" x="-25" y="-20" width="150" height="150" />

                    </g>
                </svg>
            </div>
        </div>

        <div class="flex-1 space-y-6">
            <h2 class="text-3xl font-semibold text-indigo-600">Know About Developer</h2>
            <p class="text-lg leading-relaxed">
                Hello, I'm <strong>Roshan Hari Bachhav</strong>, a versatile full-stack Java developer skilled in both
                frontend and backend development. I excel in problem-solving, team collaboration, and project
                management, and am dedicated to continuous learning and staying current with industry trends.
            </p>
            <p class="text-lg leading-relaxed">
                I recently developed the <strong>Buy Finite</strong> e-commerce website. This platform caters to the
                growing demand for gaming and virtual products, providing users with a seamless experience and
                discounted prices on their favorite items.
            </p>

            <div>
                <h2 class="text-2xl font-semibold mt-8 mb-4 text-indigo-600">Social Activity</h2>
                <div class="flex space-x-6 text-xl">
                    <a href="https://www.facebook.com/roshan.bachhav.549" class="text-blue-600 hover:text-blue-800"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/RoshanBachhav18" class="text-blue-400 hover:text-blue-600"><i
                            class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/mr.roshan_bachhav" class="text-pink-500 hover:text-pink-700"><i
                            class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/roshan-bachhav/" class="text-blue-700 hover:text-blue-900"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </section>

    @include('footer')
</body>

</html>
