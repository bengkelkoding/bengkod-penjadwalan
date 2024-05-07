<x-universal-layout>
    @section('title', 'Jadwal')

    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Penjadwalan') }}
        </h2>
    </x-slot> --}}
    <div class="relative m-8 overflow-x-scroll p-4 shadow-md sm:rounded-lg md:overflow-x-hidden">
        @if ($message = Session::get('success'))
            <div id="toast-success" class="mb-4 flex w-full max-w-xs items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400" role="alert">
                <div class="inline-flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-lg bg-green-100 text-green-500 dark:bg-green-800 dark:text-green-200">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{ $message }}</div>
                <button type="button" class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <form action="{{ route('schedule.import') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="file" name="schedule">
                <x-primary-button type="submit">Import</x-primary-button>
            </form>
        </div>
        <div class="mb-4 flex gap-2">
            <button data-modal-show="tambahSchedule" data-modal-target="tambahSchedule" type="button"
                class="inline-flex items-center rounded-lg border border-gray-300 bg-white px-3 py-1.5 text-sm font-medium text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                <span class="sr-only">Tambah Schedule</span>
                Tambah Schedule
                <svg class="ms-2.5 hidden h-5 w-5 lg:block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M18 5.05h1a2 2 0 0 1 2 2v2H3v-2a2 2 0 0 1 2-2h1v-1a1 1 0 1 1 2 0v1h3v-1a1 1 0 1 1 2 0v1h3v-1a1 1 0 1 1 2 0v1Zm-15 6v8a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-8H3ZM11 18a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1a1 1 0 1 0-2 0v1h-1a1 1 0 1 0 0 2h1v1Z" clip-rule="evenodd" />
                </svg>

            </button>
        </div>
        <table class="mb-4 w-full rounded-2xl text-left text-sm text-gray-500 shadow-md rtl:text-right dark:text-gray-400 md:table">
            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        No
                    </th>
                    <th scope="col" class="p-4">
                        ID Dosen
                    </th>
                    <th scope="col" class="p-4">
                        Kode Matkul
                    </th>
                    <th scope="col" class="p-4">
                        Nama Matkul
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kode Kelompok
                    </th>
                    <th scope="col" class="px-6 py-3">
                        SKS
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kuota
                    </th>
                    <th scope="col" class="px-6 py-3">
                        MHS
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($schedules as $index => $schedule)
                    <tr class="bg-white hover:bg-gray-50 dark:bg-gray-800 dark:hover:bg-gray-600">
                        <td class="p-4 px-6">
                            {{ $index + $schedules->firstItem() }}
                        </td>
                        <td class="p-4 px-6">
                            {{ $schedule->dosen_id }}
                        </td>
                        <td class="p-4 px-6">
                            {{ $schedule->kode_matkul }}
                        </td>
                        <td class="p-4 px-6">
                            {{ $schedule->nama_matkul }}
                        </td>
                        <td class="p-4 px-6">
                            {{ $schedule->kode_kelompok }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $schedule->sks }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $schedule->kuota }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $schedule->jumlah_mahasiswa }}
                        </td>
                        <td class="flex gap-2 px-6 py-4">
                            <button data-modal-target="updateSchedule{{ $schedule->id }}" data-modal-show="updateSchedule{{ $schedule->id }}" type="button" class="bg-merah text-merah border-merah hover:bg-abu-abu inline-flex items-center rounded-lg border p-2.5 text-center text-sm font-medium hover:text-red-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                <svg class="text-putih h-5 w-5 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M11.3 6.2H5a2 2 0 0 0-2 2V19a2 2 0 0 0 2 2h11c1.1 0 2-1 2-2.1V11l-4 4.2c-.3.3-.7.6-1.2.7l-2.7.6c-1.7.3-3.3-1.3-3-3.1l.6-2.9c.1-.5.4-1 .7-1.3l3-3.1Z" clip-rule="evenodd" />
                                    <path fill-rule="evenodd" d="M19.8 4.3a2.1 2.1 0 0 0-1-1.1 2 2 0 0 0-2.2.4l-.6.6 2.9 3 .5-.6a2.1 2.1 0 0 0 .6-1.5c0-.2 0-.5-.2-.8Zm-2.4 4.4-2.8-3-4.8 5-.1.3-.7 3c0 .3.3.7.6.6l2.7-.6.3-.1 4.7-5Z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Edit User</span>
                            </button>
                            <button data-modal-target="deleteSchedule{{ $schedule->id }}" data-modal-show="deleteSchedule{{ $schedule->id }}" type="button" class="bg-merah text-merah border-merah hover:bg-abu-abu me-2 inline-flex items-center rounded-lg border p-2.5 text-center text-sm font-medium hover:text-red-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                <svg class="text-putih h-5 w-5 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M8.6 2.6A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4c0-.5.2-1 .6-1.4ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Delete User</span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $schedules->links() }}
    </div>

    <!-- Tambah Schedule -->
    <div id="tambahSchedule" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden p-4 md:inset-0">
        <div class="relative max-h-full w-full max-w-2xl">
            <!-- Modal content -->
            <form class="relative rounded-lg bg-white shadow dark:bg-gray-700" action="/insertSchedule" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Modal header -->
                <div class="flex items-start justify-between rounded-t border-b p-4 dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Schedule
                    </h3>
                    <button type="button" class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tambahSchedule">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="space-y-6 p-6">
                    <div class="grid grid-cols-4 gap-3 md:grid-cols-4">
                        <div class="col-span-8 md:col-span-2">
                            <label for="nip" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">NIP Dosen</label>
                            <input type="text" name="nip" id="nip" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" placeholder="" required="">
                        </div>
                        <div class="col-span-4 md:col-span-2">
                            <label for="nama_matkul" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Mata Kuliah</label>
                            <select name="nama_matkul" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                <option value="">Pilih Mata Kuliah</option>
                                @foreach ($scheduleMatkul as $schedule)
                                    <option value="{{ $schedule }}">{{ $schedule }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-4 md:col-span-2">
                            <label for="kode_kelompok" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Kode Kelompok</label>
                            <input type="text" name="kode_kelompok" id="kode_kelompok" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" placeholder=""
                                required="">
                        </div>
                        <div class="col-span-4 sm:col-span-1">
                            <label for="kuota" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Kuota</label>
                            <input type="number" name="kuota" id="kuota" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" placeholder="" required="">
                        </div>
                        <div class="col-span-3 sm:col-span-1">
                            <label for="jumlah_mahasiswa" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Jumlah Mahasiswa</label>
                            <input type="number" name="jumlah_mahasiswa" id="jumlah_mahasiswa" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" placeholder=""
                                required="">
                        </div>
                        <div class="col-span-4 grid grid-cols-4 gap-3 md:grid-cols-4">
                            <span class="col-span-4 inline-flex items-center justify-center rounded border-b px-2 text-sm font-medium text-black">
                                Jadwal 1
                            </span>
                            <div class="col-span-5 sm:col-span-1">
                                <label for="day" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                                <select id="day" name="day" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                    <option value="SENIN">Senin</option>
                                    <option value="SELASA">Selasa</option>
                                    <option value="RABU">Rabu</option>
                                    <option value="KAMIS">Kamis</option>
                                    <option value="JUMAT">Jumat</option>
                                    <option value="SABTU">Sabtu</option>
                                    <option value="MINGGU">Minggu</option>
                                    <option value="">-</option>
                                </select>
                            </div>
                            <div class="col-span-4 sm:col-span-1">
                                <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Ruang</label>
                                <select name="name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                    <option value="">Pilih Ruang</option>
                                    @foreach ($ruang as $rooms)
                                        <option value="{{ $rooms }}">{{ $rooms }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-1">
                                <label for="time_start" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Mulai</label>
                                <div class="relative">
                                    <input name="time_start" id="time_start" type="time" id="time" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm leading-none text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        min="07:00" max="21:00" required />
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-1">
                                <label for="time_end" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Selesai</label>
                                <div class="relative">
                                    <input type="time" name="time_end" id="time_end" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm leading-none text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" min="07:00"
                                        max="21:00" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-span-4 grid grid-cols-4 gap-3 md:grid-cols-4">
                            <span class="col-span-4 inline-flex items-center justify-center rounded border-b px-2 text-sm font-medium text-black">
                                Jadwal 2
                            </span>
                            <div class="col-span-5 sm:col-span-1">
                                <label for="day2" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                                <select id="day2" name="day2" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                    <option value="SENIN">Senin</option>
                                    <option value="SELASA">Selasa</option>
                                    <option value="RABU">Rabu</option>
                                    <option value="KAMIS">Kamis</option>
                                    <option value="JUMAT">Jumat</option>
                                    <option value="SABTU">Sabtu</option>
                                    <option value="MINGGU">Minggu</option>
                                    <option value="">-</option>
                                </select>
                            </div>
                            <div class="col-span-4 sm:col-span-1">
                                <label for="name2" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Ruang</label>
                                <select name="name2" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                    <option value="">Pilih Ruang</option>
                                    @foreach ($ruang as $rooms)
                                        <option value="{{ $rooms }}">{{ $rooms }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-1">
                                <label for="time_start2" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Mulai</label>
                                <div class="relative">
                                    <input name="time_start2" id="time_start2" type="time" id="time" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm leading-none text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        min="07:00" max="21:00" />
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-1">
                                <label for="time_end2" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Selesai</label>
                                <div class="relative">
                                    <input type="time" name="time_end2" id="time_end2" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm leading-none text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" min="07:00"
                                        max="21:00" />
                                </div>
                            </div>
                        </div>
                        <div class="col-span-4 grid grid-cols-4 gap-3 md:grid-cols-4">
                            <span class="col-span-4 inline-flex items-center justify-center rounded border-b px-2 text-sm font-medium text-black">
                                Jadwal 3
                            </span>
                            <div class="col-span-5 sm:col-span-1">
                                <label for="day3" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                                <select id="day3" name="day3" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                    <option value="SENIN">Senin</option>
                                    <option value="SELASA">Selasa</option>
                                    <option value="RABU">Rabu</option>
                                    <option value="KAMIS">Kamis</option>
                                    <option value="JUMAT">Jumat</option>
                                    <option value="SABTU">Sabtu</option>
                                    <option value="MINGGU">Minggu</option>
                                    <option value="">-</option>
                                </select>
                            </div>
                            <div class="col-span-4 sm:col-span-1">
                                <label for="name3" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Ruang</label>
                                <select name="name3" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                    <option value="">Pilih Ruang</option>
                                    @foreach ($ruang as $ruang2)
                                        <option value="{{ $ruang2 }}">{{ $ruang2 }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-1">
                                <label for="time_start3" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Mulai</label>
                                <div class="relative">
                                    <input name="time_start3" id="time_start3" type="time" id="time" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm leading-none text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        min="07:00"
                                        max="21:00" "  />
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-1">
                            <label for="time_end3" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Selesai</label>
                            <div class="relative">
                                <input type="time" name="time_end3" id="time_end3" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm leading-none text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" min="07:00" max="21:00" " />
                                </div>
                            </div>
                            {{-- <span id="tambahJadwal" class="col-span-4 inline-flex justify-center items-center px-2 text-sm font-medium text-white bg-blue-700 rounded">
                            Tambah Jadwal
                            <button type="button" class="inline-flex items-center p-1 ms-2 text-sm text-white bg-transparent rounded-sm hover:bg-blue-700 hover:text-yellow-400 dark:hover:bg-pink-800 dark:hover:text-pink-300" data-dismiss-target="#tambahJadwal" aria-label="Remove">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M18 5.05h1a2 2 0 0 1 2 2v2H3v-2a2 2 0 0 1 2-2h1v-1a1 1 0 1 1 2 0v1h3v-1a1 1 0 1 1 2 0v1h3v-1a1 1 0 1 1 2 0v1Zm-15 6v8a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-8H3ZM11 18a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1a1 1 0 1 0-2 0v1h-1a1 1 0 1 0 0 2h1v1Z" clip-rule="evenodd"/>
                            </svg>                                  
                            <span class="sr-only">Tambah Jadwal</span>
                            </button>
                        </span> --}}
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center space-x-3 rounded-b border-t border-gray-200 p-6 rtl:space-x-reverse dark:border-gray-600">
                    <button type="submit" class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Data</button>
                </div>
            </form>
        </div>
    </div>


    @foreach ($schedules as $schedule)
        <!-- Edit Schedule -->
        <div id="updateSchedule{{ $schedule->id }}" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden p-4 md:inset-0">
            <div class="relative max-h-full w-full max-w-2xl">
                <!-- Modal content -->
                <form class="relative rounded-lg bg-white shadow dark:bg-gray-700" action="/updateSchedule/{{ $schedule->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Modal header -->
                    <div class="flex items-start justify-between rounded-t border-b p-4 dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Schedule
                        </h3>
                        <button type="button" class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="updateSchedule{{ $schedule->id }}">
                            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="space-y-6 p-6">
                        <div class="grid grid-cols-4 gap-3 md:grid-cols-4">
                            <div class="col-span-8 md:col-span-2">
                                <label for="nip" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">NIP Dosen</label>
                                <input value="{{ $schedule->dosen->nip ?? '' }}" type="text" name="nip" id="nip"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" placeholder="{{ $schedule->dosen->nip ?? 'kosong' }}">
                            </div>
                            <div class="col-span-4 md:col-span-2">
                                <label for="nama_matkul" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Mata Kuliah</label>
                                <select name="nama_matkul" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                    <option value="">Pilih Mata Kuliah</option>
                                    <option value="{{ $schedule->nama_matkul }}" selected>{{ $schedule->nama_matkul }}</option>
                                    @foreach ($scheduleMatkul as $matkul)
                                        <option value="{{ $matkul }}">{{ $matkul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-4 md:col-span-2">
                                <label for="kode_kelompok" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Kode Kelompok</label>
                                <input value="{{ $schedule->kode_kelompok }}" type="text" name="kode_kelompok" id="kode_kelompok"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" placeholder="" required="">
                            </div>
                            <div class="col-span-4 sm:col-span-1">
                                <label for="kuota" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Kuota</label>
                                <input value="{{ $schedule->kuota }}" type="number" name="kuota" id="kuota" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    placeholder="" required="">
                            </div>
                            <div class="col-span-3 sm:col-span-1">
                                <label for="jumlah_mahasiswa" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Jumlah Mahasiswa</label>
                                <input value="{{ $schedule->jumlah_mahasiswa }}" type="number" name="jumlah_mahasiswa" id="jumlah_mahasiswa"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" placeholder="" required="">
                            </div>


                            @foreach ($schedule->scheduleSessions as $session)
                                @if ($session->schedule_id == $schedule->id)
                                    <div class="col-span-4 grid grid-cols-4 gap-3 md:grid-cols-4">
                                        <span class="col-span-4 inline-flex items-center justify-center rounded border-b px-2 text-sm font-medium text-black">
                                            Jadwal {{ $loop->index + 1 }}
                                        </span>
                                        <input type="hidden" id="session_id{{ $loop->index + 1 }}" name="session_id{{ $loop->index + 1 }}" value="{{ $session->id }}">
                                        <div class="col-span-5 sm:col-span-1">
                                            <label for="day{{ $loop->index + 1 }}" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                                            <select id="day{{ $loop->index + 1 }}" name="day{{ $loop->index + 1 }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                                <option value="{{ $session->day }}" selected>{{ $session->day }}</option>
                                                <option value="SENIN">Senin</option>
                                                <option value="SELASA">Selasa</option>
                                                <option value="RABU">Rabu</option>
                                                <option value="KAMIS">Kamis</option>
                                                <option value="JUMAT">Jumat</option>
                                                <option value="SABTU">Sabtu</option>
                                                <option value="MINGGU">Minggu</option>
                                                <option value="">-</option>
                                            </select>
                                        </div>
                                        <div class="col-span-4 sm:col-span-1">
                                            <label for="name{{ $loop->index + 1 }}" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Ruang</label>
                                            <select name="name{{ $loop->index + 1 }}" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-600 focus:ring-blue-600 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                                <option value="">Pilih Ruang</option>
                                                <option value="{{ $session->classrooms->name ?? '' }}" selected>{{ $session->classrooms->name ?? '-' }}</option>
                                                @foreach ($ruang as $rooms)
                                                    <option value="{{ $rooms }}">{{ $rooms }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-span-6 sm:col-span-1">
                                            <label for="time_start{{ $loop->index + 1 }}" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Mulai</label>
                                            <div class="relative">
                                                <input value="{{ $session->time_start }}" name="time_start{{ $loop->index + 1 }}" id="time_start{{ $loop->index + 1 }}" type="time" id="time"
                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm leading-none text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" min="07:00" max="21:00" required />
                                            </div>
                                        </div>
                                        <div class="col-span-6 sm:col-span-1">
                                            <label for="time_end{{ $loop->index + 1 }}" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Selesai</label>
                                            <div class="relative">
                                                <input value="{{ $session->time_end }}" type="time" name="time_end{{ $loop->index + 1 }}" id="time_end{{ $loop->index + 1 }}"
                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm leading-none text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" min="07:00" max="21:00" required />
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center space-x-3 rounded-b border-t border-gray-200 p-6 rtl:space-x-reverse dark:border-gray-600">
                        <button type="submit" class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit Data</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach



    @foreach ($schedules as $schedule)
        <div id="deleteSchedule{{ $schedule->id }}" tabindex="-1" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
            <div class="relative max-h-full w-full max-w-md p-4">
                <div class="relative rounded-lg bg-white shadow">
                    <button type="button" class="absolute end-2.5 top-3 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="deleteSchedule{{ $schedule->id }}">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="merah" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 text-center md:p-5">
                        <svg class="text-merah mx-auto mb-4 h-12 w-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Kamu yakin untuk menghapus kode kelompok<span class="text-merah"> {{ $schedule->kode_kelompok }}</span>?</h3>
                        <a href="/deleteSchedule/{{ $schedule->id }}" data-modal-hide="deleteSchedule{{ $schedule->id }}" type="button" class="me-2 inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                            Ya
                        </a>
                        <button data-modal-hide="deleteSchedule{{ $schedule->id }}" type="button"
                            class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-universal-layout>
