<x-universal-layout>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <section class="container w-full bg-slate-50 h-[85vh] p-5 gap-5 flex flex-col rounded-lg">
        <section class="top-box w-full flex flex-col lg:flex-row gap-4">
            {{-- jumlah laporan izin --}}
            <a href="/absent/absentRequest" class="box1 rounded-lg p-3 lg:w-1/2 h-auto shadow-lg cursor-pointer hover:bg-slate-100">
                <div class="icon flex gap-2">
                    <dotlottie-player class="w-20"
                        src="https://lottie.host/6761cf88-fa33-4927-9fce-10d8f14f5ef0/RIbMwGQsgs.json"
                        background="transparent" speed="0.5" loop autoplay></dotlottie-player>
                    <div class="detail-person">
                        <h1 class="text-3xl font-bold">Verifikasi Absen</h1>
                        <h1 class="text-7xl font-thin">80</h1>
                        <div class="look flex gap-3 items-center">
                            <p class="text-base">Mahasiswa</p>
                            <button type="button"
                                class=" mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-0.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Detail</button>
                        </div>
                        <p class="text-sm text-slate-600">Verifikasi automatis <span class="text-red-500">ditolak</span>
                            jika sudah
                            melewati 3 hari tanpa verifikasi.</p>
                    </div>
                    {{-- tool tips --}}
                    {{-- <div class="tootips-details">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24" data-tooltip-target="tooltip-click" data-tooltip-trigger="click"
                            data-tooltip-placement="right">
                            <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.008-3.018a1.502 1.502 0 0 1 2.522 1.159v.024a1.44 1.44 0 0 1-1.493 1.418 1 1 0 0 0-1.037.999V14a1 1 0 1 0 2 0v-.539a3.44 3.44 0 0 0 2.529-3.256 3.502 3.502 0 0 0-7-.255 1 1 0 0 0 2 .076c.014-.398.187-.774.48-1.044Zm.982 7.026a1 1 0 1 0 0 2H12a1 1 0 1 0 0-2h-.01Z"
                                clip-rule="evenodd" />
                        </svg>

                        <div id="tooltip-click" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Tooltip on top
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div> --}}

                </div>
            </a>

            {{-- Info details --}}
            <div class="Info w-full flex flex-col justify-center">
                {{-- <h1 class="text-3xl">Details</h1> --}}
                <div class="box-info gap-2 w-full flex items-center justify-center flex-col md:flex-row">
                    {{-- jumlah laporan tidak diterima --}}
                    <div
                        class="box2 rounded-lg flex items-center p-3 cursor-pointer hover:bg-slate-100 w-full lg:w-1/2 h-[20vh] shadow-lg">
                        <div class="icon flex w-full">
                            <dotlottie-player class="w-12"
                                src="https://lottie.host/574aee2c-7a02-420e-94f6-1decd4d1dfdb/fxttvViiuV.json"
                                background="transparent" speed="0.5" loop autoplay></dotlottie-player>
                            <div class="detail-person w-full">
                                <h1 class="text-xl font-bold">Verifikasi Ditolak</h1>
                                <h1 class="text-3xl font-thin">10 <span class="text-base">Mahasiswa</span>
                                </h1>

                                <button type="button"
                                    class="text-blue-700 w-1/2 mt-2 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Detail</button>

                            </div>
                        </div>
                    </div>
                    {{-- jumlah laporan diterima --}}
                    <div
                        class="box3 rounded-lg flex items-center p-3 cursor-pointer hover:bg-slate-100 w-full lg:w-1/2 h-[20vh] shadow-lg">
                        <div class="icon flex w-full">
                            <dotlottie-player class="w-12"
                                src="https://lottie.host/66f50242-6198-48fd-b325-1cc269a4f615/4JGZFiAUoV.json"
                                background="transparent" speed="0.5" loop autoplay></dotlottie-player>
                            <div class="detail-person w-full">
                                <h1 class="text-xl font-bold">Verifikasi Diterima</h1>
                                <h1 class="text-3xl font-thin">900 <span class="text-base">Mahasiswa</span>
                                </h1>
                                <button type="button"
                                    class="text-blue-700 w-1/2 mt-2 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Detail</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- Grafik --}}

        <section class="bot-box bg-red-50 h-full rounded-lg">
            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between mb-5">
                    <div class="grid gap-4 grid-cols-2">
                        <div>
                            <h5
                                class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">
                                Clicks
                                <svg data-popover-target="clicks-info" data-popover-placement="bottom"
                                    class="w-3 h-3 text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <div data-popover id="clicks-info" role="tooltip"
                                    class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                    <div class="p-3 space-y-2">
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Clicks growth -
                                            Incremental</h3>
                                        <p>Report helps navigate cumulative growth of community activities. Ideally, the
                                            chart should have a growing trend, as stagnating chart signifies a
                                            significant decrease of community activity.</p>
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                        <p>For each date bucket, the all-time volume of activities is calculated. This
                                            means that activities in period n contain all activities up to period n,
                                            plus the activities generated by your community in period.</p>
                                        <a href="#"
                                            class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read
                                            more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                            </svg></a>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                            </h5>
                            <p class="text-gray-900 dark:text-white text-2xl leading-none font-bold">42,3k</p>
                        </div>
                        <div>
                            <h5
                                class="inline-flex items-center text-gray-500 dark:text-gray-400 leading-none font-normal mb-2">
                                CPC
                                <svg data-popover-target="cpc-info" data-popover-placement="bottom"
                                    class="w-3 h-3 text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <div data-popover id="cpc-info" role="tooltip"
                                    class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                    <div class="p-3 space-y-2">
                                        <h3 class="font-semibold text-gray-900 dark:text-white">CPC growth - Incremental
                                        </h3>
                                        <p>Report helps navigate cumulative growth of community activities. Ideally, the
                                            chart should have a growing trend, as stagnating chart signifies a
                                            significant decrease of community activity.</p>
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                        <p>For each date bucket, the all-time volume of activities is calculated. This
                                            means that activities in period n contain all activities up to period n,
                                            plus the activities generated by your community in period.</p>
                                        <a href="#"
                                            class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read
                                            more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                            </svg></a>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                            </h5>
                            <p class="text-gray-900 dark:text-white text-2xl leading-none font-bold">$5.40</p>
                        </div>
                    </div>
                    <div>
                        <button id="dropdownDetailButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom" type="button"
                            class="px-3 py-2 inline-flex items-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Last
                            week <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button>
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDetailButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                        7 days</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                        30 days</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                        90 days</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="line-chart"></div>
                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-2.5">
                    <div class="pt-5">
                        <a href="#"
                            class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-3.5 h-3.5 text-white me-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                <path
                                    d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2Zm-3 15H4.828a1 1 0 0 1 0-2h6.238a1 1 0 0 1 0 2Zm0-4H4.828a1 1 0 0 1 0-2h6.238a1 1 0 1 1 0 2Z" />
                                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                            </svg>
                            View full report
                        </a>
                    </div>
                </div>
            </div>



        </section>
    </section>

    <script>
        const options = {
            chart: {
                height: "100%",
                maxWidth: "100%",
                type: "line", // Mengubah tipe chart menjadi line
                fontFamily: "Inter, sans-serif",
                dropShadow: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
            },
            tooltip: {
                enabled: true,
                x: {
                    show: false,
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                width: 6,
                curve: 'smooth' // Menambahkan kurva pada garis
            },
            grid: {
                show: true,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -26
                },
            },
            series: [{
                    name: "Clicks",
                    data: [6500, 6418, 6456, 6526, 6356, 6456],
                    color: "#1A56DB",
                },
                {
                    name: "CPC",
                    data: [6456, 6356, 6526, 6332, 6418, 6500],
                    color: "#7E3AF2",
                },
            ],
            legend: {
                show: false
            },
            xaxis: {
                categories: ['01 Feb', '02 Feb', '03 Feb', '04 Feb', '05 Feb', '06 Feb', '07 Feb'],
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: true, // Menampilkan sumbu Y
            },
        }

        if (document.getElementById("line-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("line-chart"), options);
            chart.render();
        }
    </script>

</x-universal-layout>
