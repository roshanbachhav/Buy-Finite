<!DOCTYPE html>
<html lang="en">

@extends('layouts.adminApp')

<body class="sm:ml-64">
    @include('admin.sideMenu')
    @include('admin.header')
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6">
            <div class="grid grid-cols-12 gap-4 md:gap-6">
                <div class="col-span-12 space-y-6">
                    @include('admin.partials.metric-group.metric-group-01')
                </div>
                <div class="col-span-12 space-y-6 xl:col-span-12">
                    @include('admin.partials.chart.chart-01')
                </div>
                <div class="col-span-12">
                    @include('admin.partials.chart.chart-03')
                </div>
                <div class="col-span-12 xl:col-span-5">
                    @include('admin.partials.map-01')
                </div>
                <div class="col-span-12 xl:col-span-7">
                    @include('admin.partials.table.table-01')
                </div>
            </div>
        </div>
    </main>


    <script src="js/app.js"></script>
</body>

</html>
