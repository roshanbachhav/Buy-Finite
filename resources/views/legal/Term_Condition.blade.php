<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buy Finite - Terms & Conditions</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-50 text-gray-800">

    @include('navbar')

    <div class="text-center py-16 bg-white shadow">
        <h1 class="text-4xl font-bold text-gray-900">Terms & Conditions</h1>
        <p class="mt-2 text-lg text-gray-600">Welcome to Buy Finite. Scroll down to read our T &amp; C.</p>
    </div>

    <main class="max-w-6xl mx-auto px-6 py-12 space-y-16">

        <section>
            <p class="text-xl leading-relaxed">
                By using our website and services, you agree to comply with and be bound by the following terms and
                conditions.
                Please review them carefully. If you do not agree with these terms, you should not use this website.
            </p>
        </section>

        <!-- Use of Website -->
        <section>
            <h2 class="text-4xl font-semibold text-gray-900 mb-4">Use of Website</h2>
            <ul class="list-disc pl-6 space-y-2 text-gray-700 text-xl">
                <li>Children may only add products to checkout under supervision.</li>
                <li>Payment details must be entered by individuals 18+ or their guardians.</li>
                <li>Use the Website only for lawful purposes.</li>
                <li>Do not attempt unauthorized access to any part of the Website.</li>
            </ul>
        </section>

        <!-- Account Registration -->
        <section>
            <h2 class="text-4xl font-semibold text-gray-900 mb-4">Account Registration</h2>
            <ul class="list-disc pl-6 space-y-2 text-gray-700 text-xl">
                <li>Account registration may be required to access some features.</li>
                <li>Provide accurate and up-to-date information.</li>
                <li>You are responsible for maintaining account confidentiality.</li>
                <li>Do not engage in malicious activity with registration or forms.</li>
            </ul>
        </section>

        <!-- Payments and Orders -->
        <section>
            <h2 class="text-4xl font-semibold text-gray-900 mb-4">Payments and Orders</h2>
            <ul class="list-disc pl-6 space-y-2 text-gray-700 text-xl">
                <li>All orders are subject to acceptance and availability.</li>
                <li>We reserve the right to refuse or cancel any order.</li>
                <li>Prices may change without notice.</li>
                <li>Payments must be made via accepted payment methods at the time of purchase.</li>
            </ul>
        </section>

        <!-- Intellectual Property -->
        <section>
            <h2 class="text-4xl font-semibold text-gray-900 mb-4">Intellectual Property</h2>
            <ul class="list-disc pl-6 space-y-2 text-gray-700 text-xl">
                <li>All content on this site is the property of Buy Finite.</li>
                <li>Unauthorized reproduction or redistribution is prohibited.</li>
            </ul>
        </section>

        <!-- Contact Information -->
        <section>
            <h2 class="text-4xl font-semibold text-gray-900 mb-4">Contact Information</h2>
            <ul class="list-disc pl-6 space-y-2 text-gray-700 text-xl">
                <li>Questions or concerns? Email us at <a href="mailto:bachhavroshan600@gmail.com"
                        class="text-blue-600 underline">bachhavroshan600@gmail.com</a>. or <a
                        href="{{ route('contact.us') }}" class="text-blue-600 underline">raise pending here</a> </li>
                <li>Do not misuse contact forms for spam or irrelevant messages.</li>
            </ul>
        </section>

    </main>

    @include('footer')

    <!-- Alpine.js if needed -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js"></script>

</body>

</html>
