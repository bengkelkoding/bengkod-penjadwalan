<x-universal-layout>

    @section('title', 'Penjadwalan')

    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
          <li class="inline-flex items-center">
            <a href="/" class="inline-flex items-center text-sm font-bold text-gray-700 hover:text-indigo-900 dark:text-gray-400 dark:hover:text-white">
              <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
              </svg>
              Home
            </a>
          </li>
          <li aria-current="page">
            <div class="flex items-center">
              <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
              </svg>
              <span class="ms-3 font-semibold text-gray-500 group-hover:text-white text-l">Schedule</span>
            </div>
          </li>
        </ol>
      </nav>
      <h2 class= "font-extrabold text-indigo-900 group-hover:text-white text-3xl">Schedule</h2>
      
  

    
    @if ($message = Session::get('success'))
        <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ $message }}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
    @if($message = Session::get('errors'))
        <div id="alert-2" class="flex items-center  p-4 mt-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ $message }}
            </div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
            </button>
        </div>
    @endif
    @error('schedule_file')
        <div class="ms-3 text-sm font-normal">{{ $message }}</div>
    @enderror

<div class="flex w-full items-center justify-between xl:flex-row flex-col space-y-4 xl:space-y-0 py-4 bg-white dark:bg-gray-900">
    <div class="flex gap-2">
        <button data-modal-show="tambahSchedule" data-modal-target="tambahSchedule" type="button" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
            <span class="sr-only">Tambah Schedule</span>
            Tambah Schedule
            <svg class="w-5 h-5 ms-2.5  lg:block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M18 5.05h1a2 2 0 0 1 2 2v2H3v-2a2 2 0 0 1 2-2h1v-1a1 1 0 1 1 2 0v1h3v-1a1 1 0 1 1 2 0v1h3v-1a1 1 0 1 1 2 0v1Zm-15 6v8a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-8H3ZM11 18a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1a1 1 0 1 0-2 0v1h-1a1 1 0 1 0 0 2h1v1Z" clip-rule="evenodd" />
            </svg>
        </button>
        <button data-modal-target="uploudExcel-modal" data-modal-toggle="uploudExcel-modal" id="file_input" type="file" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
            <span class="sr-only">Import Excel</span>
            Import Excel
            <svg class="w-5 h-5 ms-2.5  lg:block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M9 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm2-2a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm0 3a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3Zm-6 4c0-.6.4-1 1-1h8c.6 0 1 .4 1 1v6c0 .6-.4 1-1 1H8a1 1 0 0 1-1-1v-6Zm8 1v1h-2v-1h2Zm0 3h-2v1h2v-1Zm-4-3v1H9v-1h2Zm0 3H9v1h2v-1Z" clip-rule="evenodd"/>
            </svg>                 
        </button>
    </div>
    <div id="uploudExcel-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <form action="{{ route('schedule.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="p-4 md:p-5 text-center">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                        <input type="file" name="schedule_file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">

                        <button type="sumbit" class="mt-4 inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                            <span class="sr-only">Import</span>
                            Import                 
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <label for="table-search" class="sr-only">Search</label>
    <div class="relative flex flex-col w-full xl:w-auto">
        <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <form action=" " method="GET">
            <input type="search" name="search" id="table-search-users" class="block pt-2 ps-10 text-sm h-9 text-gray-900 border border-gray-300 rounded-lg w-full xl:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Schedule">
        </form>
    </div>
</div>



    {{-- Tampilan mobile --}}
    @foreach ($schedules as $index => $schedule)
    <div class="grid grid-cols-1 gap-4 md:hidden data-modal-target="updateSchedule{{ $schedule->id }}" data-modal-show="updateSchedule{{ $schedule->id }}"">
        <div class="bg-white mb-3 p-4 rounded-lg shadow">
            <div class="flex flex-wrap items-center space-x-2 text-sm">
                <div class="flex items-center" >
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{ $schedule->nama_matkul }}</div>
                        <div class="font-normal mb-1 text-gray-500">{{ $schedule->dosen->user->fullname ?? 'Null' }}</div>
                        <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                            <svg class="w-3 h-3 me-1 text-green-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd"/>
                                </svg>
                                
                            {{ $schedule->kode_matkul }}
                        </span>
                        <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                            <svg class="w-3 h-3 me-1 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                            </svg>
                            {{ $schedule->kode_kelompok }}
                        </span>
                        <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                            <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                            {{ $schedule->sks }} SKS
                        </span>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <table class="mb-4 hidden md:table w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-md rounded-2xl">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    No
                </th>
                <th scope="col" class="p-4">
                    Dosen
                </th>
                <th scope="col" class="p-4">
                    Kode Matkul
                </th>
                <th scope="col" class="p-4">
                    Nama Matkul
                </th>
                <th scope="col" class="p-4">
                    Kode Kelompok
                </th>
                <th scope="col" class="p-4">
                    SKS
                </th>
                <th scope="col" class="p-4">
                    Kuota
                </th>
                <th scope="col" class="p-4">
                    MHS
                </th>
                <th scope="col" class="p-4">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach ($schedules as $index => $schedule)
            <tr class="bg-white dark:bg-gray-800  hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="p-4">
                    {{ $index + $schedules->firstItem() }}
                </td>
                <td class="p-4">
                    {{ $schedule->dosen->user->fullname ?? 'Null' }}
                </td>
                <td class="p-4">
                    {{ $schedule->kode_matkul }}
                </td>
                <td class="p-4">
                    {{ $schedule->nama_matkul }}
                </td>
                <td class="p-4">
                    {{ $schedule->kode_kelompok }}
                </td>
                <td class="p-4">
                    {{ $schedule->sks }}
                </td>
                <td class="p-4">
                    {{ $schedule->kuota }}
                </td>
                <td class="p-4">
                    {{ $schedule->jumlah_mahasiswa }}
                </td>
                <td class="flex gap-2 p-4">
                    <button data-modal-target="updateSchedule{{ $schedule->id }}" data-modal-show="updateSchedule{{ $schedule->id }}" type="button" class=" bg-merah text-merah border border-merah hover:bg-abu-abu hover:text-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center ">
                        <svg class="w-5 h-5 text-putih dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M11.3 6.2H5a2 2 0 0 0-2 2V19a2 2 0 0 0 2 2h11c1.1 0 2-1 2-2.1V11l-4 4.2c-.3.3-.7.6-1.2.7l-2.7.6c-1.7.3-3.3-1.3-3-3.1l.6-2.9c.1-.5.4-1 .7-1.3l3-3.1Z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M19.8 4.3a2.1 2.1 0 0 0-1-1.1 2 2 0 0 0-2.2.4l-.6.6 2.9 3 .5-.6a2.1 2.1 0 0 0 .6-1.5c0-.2 0-.5-.2-.8Zm-2.4 4.4-2.8-3-4.8 5-.1.3-.7 3c0 .3.3.7.6.6l2.7-.6.3-.1 4.7-5Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Edit User</span>
                    </button>
                    <button data-modal-target="deleteSchedule{{ $schedule->id }}" data-modal-show="deleteSchedule{{ $schedule->id }}" type="button" class=" bg-merah text-merah border border-merah hover:bg-abu-abu hover:text-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2">
                        <svg class="w-5 h-5 text-putih dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
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
</x-universal-layout>


{{-- Modal --}}
<!-- Tambah Schedule -->
<div id="tambahSchedule" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50 items-center justify-center  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <form class="relative bg-white rounded-lg shadow dark:bg-gray-700" action="{{ route('schedule.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Schedule
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tambahSchedule">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-4 md:grid-cols-4 gap-3">
                    <div class="col-span-2 md:col-span-2">
                        <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP
                            Dosen</label>
                        <input type="text" name="nip" id="nip" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                    </div>
                    <div class="col-span-2 md:col-span-2">
                        <label for="kode_kelompok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Kelompok</label>
                        <input type="text" name="kode_kelompok" id="kode_kelompok" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                    </div>
                    <div class="col-span-4 md:col-span-2">
                        <label for="nama_matkul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata Kuliah</label>
                        <select name="nama_matkul" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Pilih Mata Kuliah</option>
                            @foreach ($scheduleMatkul as $schedule)
                            <option value="{{ $schedule }}">{{ $schedule }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="kuota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kuota</label>
                        <input type="number" name="kuota" id="kuota" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="jumlah_mahasiswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                            Mahasiswa</label>
                        <input type="number" name="jumlah_mahasiswa" id="jumlah_mahasiswa" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                    </div>
                    <div class="grid col-span-4 md:grid-cols-4 gap-3">
                        <span class="col-span-4 inline-flex justify-center items-center px-2 text-sm font-medium text-black border-b rounded">
                            Jadwal 1
                        </span>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="day" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                            <select id="day" name="day" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                        <div class="col-span-2 md:col-span-1">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ruang</label>
                            <select name="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Pilih Ruang</option>
                                @foreach ($ruang as $rooms)
                                <option value="{{ $rooms }}">{{ $rooms }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="time_start" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai</label>
                            <div class="relative">
                                <input name="time_start" id="time_start" type="time" id="time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="07:00" max="21:00" required />
                            </div>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="time_end" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selesai</label>
                            <div class="relative">
                                <input type="time" name="time_end" id="time_end" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="07:00" max="21:00" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-span-4 grid grid-cols-4 md:grid-cols-4 gap-3">
                        <span class="col-span-4 inline-flex justify-center items-center px-2 text-sm font-medium text-black border-b rounded">
                            Jadwal 2
                        </span>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="day2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                            <select id="day2" name="day2" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                        <div class="col-span-2 sm:col-span-1">
                            <label for="name2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ruang</label>
                            <select name="name2" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Pilih Ruang</option>
                                @foreach ($ruang as $rooms)
                                <option value="{{ $rooms }}">{{ $rooms }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="time_start2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai</label>
                            <div class="relative">
                                <input name="time_start2" id="time_start2" type="time" id="time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="07:00" max="21:00" />
                            </div>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="time_end2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selesai</label>
                            <div class="relative">
                                <input type="time" name="time_end2" id="time_end2" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="07:00" max="21:00" />
                            </div>
                        </div>
                    </div>
                    <div class="col-span-4 grid grid-cols-4 md:grid-cols-4 gap-3">
                        <span class="col-span-4 inline-flex justify-center items-center px-2 text-sm font-medium text-black border-b rounded">
                            Jadwal 3
                        </span>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="day3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                            <select id="day3" name="day3" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                        <div class="col-span-2 sm:col-span-1">
                            <label for="name3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ruang</label>
                            <select name="name3" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Pilih Ruang</option>
                                @foreach ($ruang as $ruang2)
                                <option value="{{ $ruang2 }}">{{ $ruang2 }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="time_start3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai</label>
                            <div class="relative">
                                <input name="time_start3" id="time_start3" type="time" id="time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="07:00" max="21:00" "  />
                            </div>
                        </div>
                        <div class=" col-span-2 sm:col-span-1">
                                <label for="time_end3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selesai</label>
                                <div class="relative">
                                    <input type="time" name="time_end3" id="time_end3" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="07:00" max="21:00" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Modal footer -->
            <div
                class=" flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                    Data</button>
            </div>
        </form>
    </div>
</div>


@foreach ($schedules as $schedule)
<!-- Edit Schedule -->
<div id="updateSchedule{{ $schedule->id }}" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50 items-center justify-center  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <form class="relative bg-white rounded-lg shadow dark:bg-gray-700" action="{{ route('schedule.update', $schedule->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Schedule
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="updateSchedule{{ $schedule->id }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-4 md:grid-cols-4 gap-3">
                    <div class="col-span-2 md:col-span-2">
                        <label for="nip" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP Dosen</label>
                        <input value="{{ $schedule->dosen->nip ?? '' }}" type="text" name="nip" id="nip" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $schedule->dosen->nip ?? 'kosong' }}">
                    </div>
                    <div class="col-span-2 md:col-span-2">
                        <label for="kode_kelompok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                            Kelompok</label>
                        <input value="{{ $schedule->kode_kelompok }}" type="text" name="kode_kelompok" id="kode_kelompok" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                    </div>
                    <div class="col-span-4 md:col-span-2">
                        <label for="nama_matkul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata
                            Kuliah</label>
                        <select name="nama_matkul" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">Pilih Mata Kuliah</option>
                            <option value="{{ $schedule->nama_matkul }}" selected>{{ $schedule->nama_matkul }}
                            </option>
                            @foreach ($scheduleMatkul as $matkul)
                            <option value="{{ $matkul }}">{{ $matkul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="kuota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kuota</label>
                        <input value="{{ $schedule->kuota }}" type="number" name="kuota" id="kuota" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="jumlah_mahasiswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                            Mahasiswa</label>
                        <input value="{{ $schedule->jumlah_mahasiswa }}" type="number" name="jumlah_mahasiswa" id="jumlah_mahasiswa" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                    </div>


                    @foreach ($schedule->scheduleSessions as $session)
                    @if ($session->schedule_id == $schedule->id)
                    <div class="col-span-4 grid grid-cols-4 md:grid-cols-4 gap-3">
                        <span class="col-span-4 inline-flex justify-center items-center px-2 text-sm font-medium text-black border-b rounded">
                            Jadwal {{ $loop->index + 1 }}
                        </span>
                        <input type="hidden" id="session_id{{ $loop->index + 1 }}" name="session_id{{ $loop->index + 1 }}" value="{{ $session->id }}">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="day{{ $loop->index + 1 }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hari</label>
                            <select id="day{{ $loop->index + 1 }}" name="day{{ $loop->index + 1 }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                        <div class="col-span-2 sm:col-span-1">
                            <label for="name{{ $loop->index + 1 }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ruang</label>
                            <select name="name{{ $loop->index + 1 }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Pilih Ruang</option>
                                <option value="{{ $session->classrooms->name ?? '' }}" selected>
                                    {{ $session->classrooms->name ?? '-' }}
                                </option>
                                @foreach ($ruang as $rooms)
                                <option value="{{ $rooms }}">{{ $rooms }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="time_start{{ $loop->index + 1 }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai</label>
                            <div class="relative">
                                <input value="{{ $session->time_start }}" name="time_start{{ $loop->index + 1 }}" id="time_start{{ $loop->index + 1 }}" type="time" id="time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="07:00" max="21:00" required />
                            </div>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="time_end{{ $loop->index + 1 }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selesai</label>
                            <div class="relative">
                                <input value="{{ $session->time_end }}" type="time" name="time_end{{ $loop->index + 1 }}" id="time_end{{ $loop->index + 1 }}" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="07:00" max="21:00" required />
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit Data</button>
                    
                <button data-modal-hide="updateSchedule{{ $schedule->id }}" data-modal-target="deleteSchedule{{ $schedule->id }}" data-modal-toggle="deleteSchedule{{ $schedule->id }}" type="button" class="md:hidden border hover:text-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2">
                    <svg class="w-5 h-5 text-putih dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M8.6 2.6A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4c0-.5.2-1 .6-1.4ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                    </svg>
                    <span class="sr-only">Delete Schedule</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endforeach


@foreach ($schedules as $schedule)
<div id="deleteSchedule{{ $schedule->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow ">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="deleteSchedule{{ $schedule->id }}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="merah" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-merah w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Kamu yakin untuk menghapus
                    kode kelompok<span class="text-merah"> {{ $schedule->kode_kelompok }}</span>?</h3>
                <a href="{{ route('schedule.destroy', $schedule->id) }}" data-modal-hide="deleteSchedule{{ $schedule->id }}" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                    Ya
                </a>
                <button data-modal-hide="deleteSchedule{{ $schedule->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endforeach