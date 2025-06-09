import "./bootstrap";
import Alpine from "alpinejs";
import Chart from "chart.js/auto";
import ApexCharts from "apexcharts";

import "jsvectormap";
import "jsvectormap/dist/maps/world.js";

import LocomotiveScroll from "locomotive-scroll";

window.Alpine = Alpine;
Alpine.start();

document.addEventListener("DOMContentLoaded", function () {
    const chartSelector = document.querySelector("#chartOne");

    if (chartSelector) {
        const chartOneOptions = {
            series: [
                {
                    name: "Monthly Revenue",
                    data: window.chartData.revenues,
                },
            ],
            colors: ["#1904e5"],
            chart: {
                fontFamily: "'Bricolage Grotesque', sans-serif",
                type: "bar",
                height: 300,
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "40%",
                    borderRadius: 10,
                    borderRadiusApplication: "end",
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                show: true,
                width: 4,
                colors: ["transparent"],
            },
            xaxis: {
                categories: window.chartData.months,
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            legend: {
                show: true,
                position: "top",
                horizontalAlign: "left",
                fontFamily: "'Bricolage Grotesque', sans-serif",
                markers: {
                    radius: 99,
                },
            },
            yaxis: {
                title: false,
            },
            grid: {
                yaxis: {
                    lines: {
                        show: true,
                    },
                },
            },
            fill: {
                opacity: 1,
            },
            tooltip: {
                x: {
                    show: false,
                },
                y: {
                    formatter: function (val) {
                        return val;
                    },
                },
            },
        };

        const chartOne = new ApexCharts(chartSelector, chartOneOptions);
        chartOne.render();
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const chartSelector = document.querySelector("#chartThree");

    if (chartSelector) {
        const chartThreeOptions = {
            series: [
                {
                    name: "Sales",
                    data: window.chartDataThird.sales,
                },
                {
                    name: "Revenue",
                    data: window.chartDataThird.salesRevenues,
                },
            ],
            colors: ["#465FFF", "#9CB9FF"],
            chart: {
                fontFamily: "'Bricolage Grotesque', sans-serif",
                height: 310,
                type: "area",
                toolbar: {
                    show: false,
                },
            },
            fill: {
                gradient: {
                    enabled: true,
                    opacityFrom: 0.55,
                    opacityTo: 0,
                },
            },
            stroke: {
                curve: "straight",
                width: [2, 2],
            },
            markers: {
                size: 0,
            },
            grid: {
                xaxis: {
                    lines: {
                        show: false,
                    },
                },
                yaxis: {
                    lines: {
                        show: true,
                    },
                },
            },
            dataLabels: {
                enabled: false,
            },
            tooltip: {
                x: {
                    format: "dd MMM yyyy",
                },
            },
            xaxis: {
                type: "category",
                categories: [
                    "Jan",
                    "Feb",
                    "Mar",
                    "Apr",
                    "May",
                    "Jun",
                    "Jul",
                    "Aug",
                    "Sep",
                    "Oct",
                    "Nov",
                    "Dec",
                ],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                tooltip: false,
            },
            yaxis: {
                title: {
                    style: {
                        fontSize: "0px",
                    },
                },
            },
            legend: {
                show: false,
                position: "top",
                horizontalAlign: "left",
            },
        };

        const chartThree = new ApexCharts(chartSelector, chartThreeOptions);
        chartThree.render();
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const mapSelectorOne = document.querySelector("#mapOne");

    if (mapSelectorOne) {
        const mapOne = new jsVectorMap({
            selector: "#mapOne",
            map: "world",
            zoomButtons: false,
            regionStyle: {
                initial: {
                    fontFamily: "'Bricolage Grotesque', sans-serif",
                    fill: "#D9D9D9",
                },
                hover: {
                    fillOpacity: 1,
                    fill: "#465fff",
                },
            },
            markers: [{ name: "india", coords: [19.076, 72.8777] }],
            markerStyle: {
                initial: {
                    strokeWidth: 1,
                    fill: "#465fff",
                    fillOpacity: 1,
                    r: 4,
                },
                hover: {
                    fill: "#465fff",
                    fillOpacity: 1,
                },
            },
            onRegionTooltipShow: function (tooltip, code) {
                if (code === "MH") {
                    tooltip.selector.innerHTML =
                        tooltip.text() + " <b>(Hello MH)</b>";
                }
            },
        });
    }
});
