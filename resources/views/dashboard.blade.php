@php
    $role = 'Lecture'; // Atur role menjadi 'Lecture'
    $totalVisitors = 12;

    $newVsReturningVisitorsDataPoints = [
        ['y' => 8, 'name' => 'Kelas Sesuai', 'color' => '#E7823A'], // y itu jumlahnya
        ['y' => 4, 'name' => 'Kelas Kurang', 'color' => '#546BC1'],
    ];

    // jadi ini berfungsi melihat jumlah kelas yang sudah sesuai dengan total jumlah masuk diharapkan admin mengetahui kelas mana yang belum melengkapi kehadiran

@endphp
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<x-universal-layout :role="$role">
    <section class="box p-3 rounded-lg h-auto  grid lg:grid-cols-3 grid-cols-1 gap-3 ">
        <div
            class="box1 w-auto h-[70vh] md:col-span-1 md:row-span-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            {{-- box grafik --}}
            <div class="w-auto h-[70vh] bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between mt-3 mb-3">
                    <div class="flex justify-center items-center">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">Attendence Traffic
                        </h5>
                        <svg data-popover-target="chart-info" data-popover-placement="bottom"
                            class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                        </svg>
                        <div data-popover id="chart-info" role="tooltip"
                            class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                            <div class="p-3 space-y-2">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Kelas Sesuai</h3>
                                <p>Kelas yang sesuai dengan jumlah dan waktu pertemuan yang seharusnya</p>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Kelas tidak Sesuai</h3>
                                <p>Kelas yang tidak sesuai dengan jumlah dan waktu pertemuan yang seharusnya, misalnya
                                    minggu ke-5 perkuliahan semua kelas seharusnya sudah masuk ke pertemuan 5, tapi
                                    karena ada kelas yang kosong, jadi kelas tersebut masih masuk ke pertemuan 4</p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                    </div>
                    <div>
                        <button type="button" data-tooltip-target="data-tooltip" data-tooltip-placement="bottom"
                            class="hidden sm:inline-flex items-center justify-center text-gray-500 w-8 h-8 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm"><svg
                                class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 16 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3" />
                            </svg><span class="sr-only">Download data</span>
                        </button>
                        <div id="data-tooltip" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Download CSV
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                </div>
                <!-- Donut Chart -->
                <div class="py-6" id="donut-chart"></div>
            </div>
        </div>

        <div
            class="box2 md:h-[70vh] md:col-span-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex justify-center items-center">
            <div class="grid p-6 w-full gap-4 grid-cols-1 md:grid-cols-2 ">

                <div class="w-full h-[30vh] shadow-xl rounded-md flex items-center hover:bg-slate-100">
                    <div class="flex  gap-3 w-full px-5 flex-wrap">
                        <div
                            class="round1 border border-[#82bd69] bg-[#e9f5e3] p-3 rounded-full w-20 h-20 flex justify-center items-center">
                            <div class="round2 bg-[#82bd69] rounded-full p-2 flex justify-center items-center">
                                <svg class="w-10 h-10 text-[#e9f5e3] dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>

                        <div class="py-3">
                            <h1 class="text-2xl bold">Total Mahasiswa</h1>
                            <p>32.000 Orang</p>
                        </div>
                    </div>

                </div>

                <div class="w-full h-[30vh] shadow-xl rounded-md flex items-center hover:bg-slate-100">
                    <div class="flex gap-3 w-full px-5 flex-wrap">
                        <div
                            class="round1 border border-[#786abe] bg-[#e7e9f8] p-3 rounded-full w-20 h-20 flex justify-center items-center">
                            <div class="round2 bg-[#786abe] rounded-full p-2 flex justify-center items-center">
                                <svg class="w-10 h-10 text-[#e7e9f8] dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>

                        <div class="py-3">
                            <h1 class="text-2xl bold">Total Dosen</h1>
                            <p>32.000 Orang</p>
                        </div>
                    </div>

                </div>

                <div class="w-full h-[30vh] shadow-xl rounded-md flex items-center hover:bg-slate-100">
                    <div class="flex  gap-3 w-full px-5 flex-wrap">
                        <div
                            class="round1 border border-[#e3e728] bg-[#f2f9c8] p-3 rounded-full w-20 h-20 flex justify-center items-center">
                            <div class="round2 bg-[#e3e728] rounded-full p-2 flex justify-center items-center">
                                <svg class="w-10 h-10 text-[#f2f9c8] dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>

                        <div class="py-3">
                            <h1 class="text-2xl bold">Total Kelas Hari ini</h1>
                            <p>32.000 Orang</p>
                        </div>
                    </div>

                </div>

                <div class="w-full h-[30vh] shadow-xl rounded-md flex items-center hover:bg-slate-100">
                    <div class="flex  gap-3 w-full px-5 flex-wrap">
                        <div
                            class="round1 border border-[#eaa035] bg-[#faeacb] p-3 rounded-full w-20 h-20 flex justify-center items-center">
                            <div class="round2 bg-[#eaa035] rounded-full p-2 flex justify-center items-center">
                                <svg class="w-10 h-10 text-[#faeacb] dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>

                        <div class="py-3">
                            <h1 class="text-2xl bold">Total Mata kuliah</h1>
                            <p>32.000 Orang</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script>
        const getChartOptions = () => {
            return {
                series: [3, 9], //ini nanti tolong diganti berdasarkan data
                colors: ["#1C64F2", "#E74694"],
                chart: {
                    height: 320,
                    width: "100%",
                    type: "donut",
                },
                stroke: {
                    colors: ["transparent"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                name: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: 20,
                                },
                                total: {
                                    showAlways: true,
                                    show: true,
                                    label: "Total Pertemuan",
                                    fontFamily: "Inter, sans-serif",
                                    formatter: function(w) {
                                        const sum = w.globals.seriesTotals.reduce((a, b) => {
                                            return a + b
                                        }, 0)
                                        return sum
                                    },
                                },
                                value: {
                                    show: true,
                                    fontFamily: "Inter, sans-serif",
                                    offsetY: -20,
                                    formatter: function(value) {
                                        return value
                                    },
                                },
                            },
                            size: "65%",
                        },
                    },
                },
                grid: {
                    padding: {
                        top: -2,
                    },
                },
                labels: ["Kelas Sesuai", "Kelas tidak sesuai"],
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }

        if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
            chart.render();

            // Attach the event listener to each checkbox
            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener('change', (event) => handleCheckboxChange(event, chart));
            });
        }
    </script>
    @push('scripts')
    @endpush

</x-universal-layout>
