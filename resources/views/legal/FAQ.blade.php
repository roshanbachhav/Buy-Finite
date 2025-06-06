<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buy Finite - FAQ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-50 text-gray-800 font-sans mt-16 ">

    @include('navbar')

    <section class="text-center py-12 bg-white shadow">
        <h1 class="text-4xl font-bold text-indigo-700 mb-2">Frequently Asked Questions</h1>
        <p class="text-gray-600 text-lg">Welcome to Buy Finite. Scroll down to read our FAQ.</p>
    </section>

    <section class="max-w-6xl mx-auto px-6 py-12">
        <div class="space-y-6">
            <div x-data="{ open: true }" class="border border-gray-200 rounded-lg">
                <button @click="open = !open"
                    class="w-full text-left px-5 py-4 bg-indigo-100 hover:bg-indigo-200 font-medium text-lg">
                    How can I Register & Login on Buy Finite?
                </button>
                <div x-show="open" class="px-5 py-4 text-gray-700 space-y-2">
                    <h4 class="font-semibold">To become a user of Buy Finite:</h4>
                    <ul class="list-disc pl-5 space-y-1">
                        <li>Visit our website at Buy Finite</li>
                        <li>Click the login button</li>
                        <li>Click the register link</li>
                        <li>Fill in your registration details carefully</li>
                        <li>Password will be sent to your email</li>
                        <li>You'll be redirected to the login page</li>
                        <li>Use your email and the provided password to log in</li>
                    </ul>
                    <p>If you encounter issues, contact our support team.</p>
                </div>
            </div>

            <div x-data="{ open: false }" class="border border-gray-200 rounded-lg">
                <button @click="open = !open"
                    class="w-full text-left px-5 py-4 bg-indigo-100 hover:bg-indigo-200 font-medium text-lg">
                    How can I place an order on Buy Finite?
                </button>
                <div x-show="open" class="px-5 py-4 text-gray-700 space-y-2">
                    <h4 class="font-semibold">To place an order:</h4>
                    <ul class="list-disc pl-5 space-y-1">
                        <li>Visit Buy Finite</li>
                        <li>Select items within your budget</li>
                        <li>Go to the cart</li>
                        <li>Proceed to checkout and select a shipping method</li>
                        <li>Enter shipping and payment info</li>
                        <li>Confirm the purchase</li>
                        <li>You will be redirected to the order overview</li>
                    </ul>
                    <p>Need help? Our support team is here for you.</p>
                </div>
            </div>

            <div x-data="{ open: false }" class="border border-gray-200 rounded-lg">
                <button @click="open = !open"
                    class="w-full text-left px-5 py-4 bg-indigo-100 hover:bg-indigo-200 font-medium text-lg">
                    What payment methods do you accept?
                </button>
                <div x-show="open" class="px-5 py-4 text-gray-700">
                    <ul class="list-disc pl-5 space-y-1">
                        <li>Credit & Debit Cards (Visa, MasterCard, etc.)</li>
                        <li>PayPal</li>
                        <li>Co-branded and Cashback Cards</li>
                        <li>Business Credit Cards</li>
                        <li>Secure and Encrypted Payment Gateway</li>
                    </ul>
                    <p>Your data is safe with our secure payment system.</p>
                </div>
            </div>

            <div x-data="{ open: false }" class="border border-gray-200 rounded-lg">
                <button @click="open = !open"
                    class="w-full text-left px-5 py-4 bg-indigo-100 hover:bg-indigo-200 font-medium text-lg">
                    How do I track my order?
                </button>
                <div x-show="open" class="px-5 py-4 text-gray-700">
                    <ul class="list-disc pl-5 space-y-1">
                        <li>Log in to your Buy Finite account</li>
                        <li>Go to your profile</li>
                        <li>Open the sidebar and click "Orders"</li>
                        <li>Select your order using the Order ID</li>
                        <li>View detailed tracking information</li>
                    </ul>
                    <p>Still need help? Reach out to our support team.</p>
                </div>
            </div>
        </div>
    </section>

    @include('footer')

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>

</html>
