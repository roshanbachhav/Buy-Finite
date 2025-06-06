<div
    class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6">
    <div class="flex flex-col gap-2 mb-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                Recent Orders
            </h3>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('orderList') }}">
                <button
                    class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                    See all
                </button>
            </a>
        </div>
    </div>

    <div class="w-full overflow-x-auto">
        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-600 dark:text-gray-300">
                        Products
                    </th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-600 dark:text-gray-300">
                        Pricing
                    </th>
                    <th class="text-left px-6 py-3 text-xs font-semibold text-gray-600 dark:text-gray-300">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                @foreach ($recentOrders as $order)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-4">
                                <div class="h-12 w-12 flex-shrink-0 overflow-hidden rounded-md">
                                    <img src="{{ asset('images/product_img/' . $order->product->productImage) }}"
                                        alt="Product" class="h-full w-full object-cover">
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $order->product->productName ?? 'N/A' }}
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Qty: {{ $order->quantity ?? 0 }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            ₹ {{ number_format($order->price, 2) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                            {{ $order->order->status === 'delivered'
                                ? 'bg-green-100 text-green-700 dark:bg-green-200/20 dark:text-green-400'
                                : ($order->order->status === 'pending'
                                    ? 'bg-yellow-100 text-yellow-700 dark:bg-yellow-200/20 dark:text-yellow-400'
                                    : 'bg-gray-100 text-gray-700 dark:bg-gray-200/20 dark:text-gray-400') }}">
                                {{ ucfirst($order->order->status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
