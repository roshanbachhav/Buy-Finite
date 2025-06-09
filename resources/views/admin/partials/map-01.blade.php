<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] sm:p-6">
    <div class="flex justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                Customers Demographic
            </h3>
            <p class="mt-1 text-theme-sm text-gray-500 dark:text-gray-400">
                Number of customer based on country
            </p>
        </div>
    </div>

    <div
        class="border-gary-200 my-6 overflow-hidden rounded-2xl border bg-gray-50 px-4 py-6 dark:border-gray-800 dark:bg-gray-900 sm:px-6">
        <div id="mapOne"
            class="mapOne map-btn -mx-4 -my-6 h-[212px] w-[252px] 2xsm:w-[307px] xsm:w-[358px] sm:-mx-6 md:w-[668px] lg:w-[634px] xl:w-[393px] 2xl:w-[554px]">
        </div>
    </div>

    <div class="space-y-5">
        <div class="flex items-center  ">
            <div class="flex items-center gap-3">
                <div class="w-full max-w-6 items-center rounded-full">
                    <img src="/Images/web-img/indiaFlagIcon.svg" alt="India" />
                </div>
                <div class="w-96">
                    <p class="text-theme-sm font-semibold text-gray-800 dark:text-white/90">
                        India
                    </p>
                    <span class="block text-theme-xs text-gray-500 dark:text-gray-400">
                        {{ $totalUsers }} customers From India
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
