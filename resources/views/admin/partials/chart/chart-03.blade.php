<div
    class="rounded-2xl border border-gray-200 bg-white px-5 pb-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
    <div class="flex flex-col gap-5 mb-6 sm:flex-row sm:justify-between">
        <div class="w-full">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                Statistics
            </h3>
            <p class="mt-1 text-gray-500 text-theme-sm dark:text-gray-400">
                Target you’ve set for each month
            </p>
        </div>

        <div class="flex items-start w-full gap-3 sm:justify-end">
            <div x-data="{ selected: 'overview' }"
                class="inline-flex w-fit items-center gap-0.5 rounded-lg bg-gray-100 p-0.5 dark:bg-gray-900">
                <button @click="selected = 'overview'"
                    :class="selected === 'overview' ? 'shadow-theme-xs text-gray-900 dark:text-white bg-white dark:bg-gray-800' :
                        'text-gray-500 dark:text-gray-400'"
                    class="px-3 py-2 font-medium rounded-md text-theme-sm hover:text-gray-900 dark:hover:text-white">
                    Overview
                </button>
                <button disabled @click="selected = 'sales'"
                    :class="selected === 'sales' ?
                        'shadow-theme-xs text-gray-900 dark:text-white bg-white dark:bg-gray-800' :
                        'text-gray-500 dark:text-gray-400'"
                    class="px-3 py-2 font-medium rounded-md text-theme-sm hover:text-gray-900 dark:hover:text-white">
                    Sales
                </button>
                <button disabled @click="selected = 'revenue'"
                    :class="selected === 'revenue' ?
                        'shadow-theme-xs text-gray-900 dark:text-white bg-white dark:bg-gray-800' :
                        'text-gray-500 dark:text-gray-400'"
                    class="px-3 py-2 font-medium rounded-md text-theme-sm hover:text-gray-900 dark:hover:text-white">
                    Revenue
                </button>
            </div>
        </div>
    </div>
    <div class="max-w-full overflow-x-auto custom-scrollbar">
        <div id="chartThree" class="-ml-4 min-w-[700px] pl-2"></div>
    </div>

    <script>
        window.chartDataThird = {
            sales: @json($sales),
            salesRevenues: @json($salesRevenues)
        };

        console.log("Chart Data:", window.chartDataThird);
    </script>


</div>
