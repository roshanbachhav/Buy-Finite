<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buy Finite - Payment & Banking</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    @include('navbar')

    <section class="bg-white text-center py-16 shadow-md">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Payment & Banking</h1>
        <p class="text-lg text-gray-600">Welcome to Buy Finite. Scroll down to read our payment terms.</p>
    </section>

    <main class="max-w-5xl mx-auto px-6 py-10 space-y-16">

        <section>
            <p class="text-lg leading-relaxed text-gray-700">
                Welcome to Buy Finite. We store banking or credit card credentials that are fully safe in our database.
                By placing an order on Buy Finite, you agree to the following payment terms and conditions:
            </p>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-gray-900 mb-6">Payment Gateways</h2>
            <div class="flex items-center justify-center gap-8 flex-wrap">
                <img src="/images/gateway/visa.png" alt="Visa" class="h-12 object-contain">
                <img src="/images/gateway/apple-pay.png" alt="Apple Pay" class="h-12 object-contain">
                <img src="/images/gateway/mastercard.png" alt="MasterCard" class="h-12 object-contain">
                <img src="/images/gateway/bank-card-back-side.png" alt="Credit Card" class="h-12 object-contain">
            </div>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Accepted Payment Methods</h2>
            <ul class="list-disc list-inside space-y-2 text-gray-700">
                <li>We accept major credit cards including Visa, MasterCard, and American Express.</li>
                <li>We also accept payments via PayPal.</li>
                <li>Additional payment methods may be available and will be listed at checkout.</li>
            </ul>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Payment Processing</h2>
            <ul class="list-disc list-inside space-y-2 text-gray-700">
                <li>All payments are processed securely through our third-party payment processors.</li>
                <li>Your payment information is encrypted and protected.</li>
                <li>Full payment must be made at the time of purchase.</li>
            </ul>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Pricing</h2>
            <ul class="list-disc list-inside space-y-2 text-gray-700">
                <li>All prices are listed in [Currency] and are subject to change without notice.</li>
                <li>Prices do not include shipping fees, taxes, and other additional charges, which will be calculated
                    at checkout.</li>
            </ul>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-gray-900 mb-6 text-center">Featured Credit Cards</h2>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide flex justify-center">
                        <img src="/images/CreditCards/cc1.png" alt="" class="h-32 rounded-lg shadow-md" />
                    </div>
                    <div class="swiper-slide flex justify-center">
                        <img src="/images/CreditCards/cc2.png" alt="" class="h-32 rounded-lg shadow-md" />
                    </div>
                    <div class="swiper-slide flex justify-center">
                        <img src="/images/CreditCards/cc4.png" alt="" class="h-32 rounded-lg shadow-md" />
                    </div>
                    <div class="swiper-slide flex justify-center">
                        <img src="/images/CreditCards/cc6.png" alt="" class="h-32 rounded-lg shadow-md" />
                    </div>
                    <div class="swiper-slide flex justify-center">
                        <img src="/images/CreditCards/cc7.png" alt="" class="h-32 rounded-lg shadow-md" />
                    </div>
                    <div class="swiper-slide flex justify-center">
                        <img src="/images/CreditCards/cc8.png" alt="" class="h-32 rounded-lg shadow-md" />
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('footer')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: "auto",
            spaceBetween: 20,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>

</body>

</html>
