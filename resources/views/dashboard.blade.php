@php
    $role = 'Lecture'; // Atur role menjadi 'Lecture'
    $totalVisitors = 12;

    $newVsReturningVisitorsDataPoints = [
        ['y' => 8, 'name' => 'Kelas Sesuai', 'color' => '#E7823A'], // y itu jumlahnya
        ['y' => 4, 'name' => 'Kelas Kurang', 'color' => '#546BC1'],
    ];

    // jadi ini berfungsi melihat jumlah kelas yang sudah sesuai dengan total jumlah masuk diharapkan admin mengetahui kelas mana yang belum melengkapi kehadiran

@endphp
<script>
    window.onload = function() {

        var totalVisitors = <?php echo $totalVisitors; ?>;
        var visitorsData = {
            "Pertemuan": [{
                cursor: "pointer",
                explodeOnClick: false,
                innerRadius: "55%", //tebal
                legendMarkerType: "square",
                name: "Pertemuan",
                radius: "100%",
                showInLegend: true,
                startAngle: 90, // Mengubah sudut awal

                type: "doughnut",
                dataPoints: <?php echo json_encode($newVsReturningVisitorsDataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        };

        var newVSReturningVisitorsOptions = {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Pertemuan" // ini untuk judul
            },
            subtitles: [{
                backgroundColor: "#2eacd1",
                fontSize: 16,
                fontColor: "white",
                padding: 5
            }],
            legend: {
                fontFamily: "calibri",
                fontSize: 14,
                itemTextFormatter: function(e) {
                    return e.dataPoint.name + ": " + Math.round(e.dataPoint.y / totalVisitors * 100) + "%";
                }
            },
            data: []
        };



        var chart = new CanvasJS.Chart("chartContainer", newVSReturningVisitorsOptions);
        chart.options.data = visitorsData["Pertemuan"];
        chart.render();





    }
</script>

<x-universal-layout :role="$role">
    <section class="box grid h-auto grid-cols-1 gap-3 rounded-lg p-3 lg:grid-cols-3">
        <div class="box1 h-[70vh] w-auto rounded-lg border border-gray-200 bg-white shadow dark:border-gray-700 dark:bg-gray-800 md:col-span-1 md:row-span-2">
            {{-- box grafik --}}
            <div class="grafik relative p-6">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <div class="pointer-events-none absolute inset-0 flex items-center justify-center">
                    <div class="text-center">
                        <h1 class="text-5xl font-bold text-gray-900 dark:text-white">12</h1>
                        <p class="mt-2 font-normal text-gray-500 dark:text-gray-400">Pertemuan</p>
                    </div>
                </div>
                <p class="mt-6 font-normal text-gray-500 dark:text-gray-400">Ganti jadi setengah</p>
            </div>
        </div>

        <div class="box2 flex items-center justify-center rounded-lg border border-gray-200 bg-white shadow dark:border-gray-700 dark:bg-gray-800 md:col-span-2 md:h-[70vh]">
            <div class="grid w-full grid-cols-1 gap-4 p-6 md:grid-cols-2">

                <div class="flex h-[30vh] w-full items-center rounded-md shadow-xl hover:bg-slate-100">
                    <div class="flex w-full flex-wrap gap-3 px-5">
                        <div class="round1 flex h-20 w-20 items-center justify-center rounded-full border border-[#82bd69] bg-[#e9f5e3] p-3">
                            <div class="round2 flex items-center justify-center rounded-full bg-[#82bd69] p-2">
                                <svg class="h-10 w-10 text-[#e9f5e3] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>

                        <div class="py-3">
                            <h1 class="bold text-2xl">Total Mahasiswa</h1>
                            <p>32.000 Orang</p>
                        </div>
                    </div>

                </div>

                <div class="flex h-[30vh] w-full items-center rounded-md shadow-xl hover:bg-slate-100">
                    <div class="flex w-full flex-wrap gap-3 px-5">
                        <div class="round1 flex h-20 w-20 items-center justify-center rounded-full border border-[#786abe] bg-[#e7e9f8] p-3">
                            <div class="round2 flex items-center justify-center rounded-full bg-[#786abe] p-2">
                                <svg class="h-10 w-10 text-[#e7e9f8] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>

                        <div class="py-3">
                            <h1 class="bold text-2xl">Total Dosen</h1>
                            <p>32.000 Orang</p>
                        </div>
                    </div>

                </div>

                <div class="flex h-[30vh] w-full items-center rounded-md shadow-xl hover:bg-slate-100">
                    <div class="flex w-full flex-wrap gap-3 px-5">
                        <div class="round1 flex h-20 w-20 items-center justify-center rounded-full border border-[#e3e728] bg-[#f2f9c8] p-3">
                            <div class="round2 flex items-center justify-center rounded-full bg-[#e3e728] p-2">
                                <svg class="h-10 w-10 text-[#f2f9c8] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>

                        <div class="py-3">
                            <h1 class="bold text-2xl">Total Kelas Hari ini</h1>
                            <p>32.000 Orang</p>
                        </div>
                    </div>

                </div>

                <div class="flex h-[30vh] w-full items-center rounded-md shadow-xl hover:bg-slate-100">
                    <div class="flex w-full flex-wrap gap-3 px-5">
                        <div class="round1 flex h-20 w-20 items-center justify-center rounded-full border border-[#eaa035] bg-[#faeacb] p-3">
                            <div class="round2 flex items-center justify-center rounded-full bg-[#eaa035] p-2">
                                <svg class="h-10 w-10 text-[#faeacb] dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>

                        <div class="py-3">
                            <h1 class="bold text-2xl">Total Mata kuliah</h1>
                            <p>32.000 Orang</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    @endpush
</x-universal-layout>

<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
