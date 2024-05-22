<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ url('/resources/css/style.css') }}">
    <script src="{{ url('/resources/js/app.js') }}"></script>
    <x-partials.head></x-partials.head>
</head>

<body>
  
    <button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar" aria-controls="separator-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
     </button>
    

    <aside id="separator-sidebar"
        class="fixed bg-white top-0 left-0 z-40 w-72 h-screen transition-transform -translate-x-full sm:translate-x-0 shadow-lg"
        aria-label="Sidebar">
        <div class="h-full px-8 py-4 overflow-y-auto dark:bg-gray-800 shadow-md">
            <ul class="space-y-2 font-medium mb-10">
                <div class="flex items-center justify-center p-2 ">
                  <img src="https://dinus.ac.id/wp-content/uploads/2023/07/Logo-Web-Biru-980x199.png" class="h-12 w-36 me-3 mt-4 object-cover" alt="UDINUS" />
               </div>
              </ul>
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="{{ (Route::is('dashboard'))? 'bg-indigo-900' : '' }} flex items-center p-3 m-4 rounded-lg hover:bg-indigo-900 group">
                        <svg class="{{ (Route::is('dashboard'))? 'text-white' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="{{ (Route::is('dashboard'))? 'text-white' : '' }} ms-3 font-semibold text-gray-500 group-hover:text-white text-lg">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('schedule.index') }}"
                        class="{{ (Route::is('schedule.index'))? 'bg-indigo-900' : '' }} flex items-center p-3 m-4 rounded-lg hover:bg-indigo-900 group">
                        <svg class="{{ (Route::is('schedule.index'))? 'text-white' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white"
                        aria-hidden="true" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 11H8V13H6V11ZM6 15H8V17H6V15ZM10 11H18V13H10V11ZM10 15H15V17H10V15Z"/>
                        </svg>
                        <span class="{{ (Route::is('schedule.index'))? 'text-white' : '' }} ms-3  font-semibold text-gray-500 group-hover:text-white text-lg">Schedule</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('absent.index') }}"
                        class="{{ (Route::is('absent.index'))? 'bg-indigo-900' : '' }} flex items-center p-3 m-4 rounded-lg hover:bg-indigo-900 group">
                        <svg class="{{ (Route::is('absent.index'))? 'text-white' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 2C20.5523 2 21 2.44772 21 3V6.757L12.0012 15.7562L11.995 19.995L16.2414 20.0012L21 15.242V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V3C3 2.44772 3.44772 2 4 2H20ZM21.7782 8.80761L23.1924 10.2218L15.4142 18L13.9979 17.9979L14 16.5858L21.7782 8.80761ZM12 12H7V14H12V12ZM15 8H7V10H15V8Z"/>
                        </svg>
                        <span class="{{ (Route::is('absent.index'))? 'text-white' : '' }} ms-3 font-semibold text-gray-500 group-hover:text-white text-lg">Absensi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('classroom.index') }}"
                        class="{{ (Route::is('classroom.index'))? 'bg-indigo-900' : '' }} flex items-center p-3 m-4 rounded-lg hover:bg-indigo-900 group">
                        <svg class="{{ (Route::is('classroom.index'))? 'text-white' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.7999 9H12V17H11V21.0001H5C4.44772 21.0001 4 20.5524 4 20.0001V11.0001H1L11.3273 1.61162C11.7087 1.26488 12.2913 1.26488 12.6727 1.61162L20.7999 9ZM14 11H23V18H14V11ZM13 21H24V19H13V21Z"/>
                            </svg>
                            <span class="{{ (Route::is('classroom.index'))? 'text-white' : '' }} ms-3 font-semibold text-gray-500 group-hover:text-white text-lg">Ruang Kelas</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('dosen.index') }}"
                        class="{{ (Route::is('dosen.index'))? 'bg-indigo-900' : '' }} flex items-center p-3 m-4 rounded-lg hover:bg-indigo-900 group">
                        <svg class="{{ (Route::is('dosen.index'))? 'text-white' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white"
                        aria-hidden="true" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 22.0001C1 17.5819 4.58172 14.0001 9 14.0001C13.4183 14.0001 17 17.5819 17 22.0001H1ZM9 13.0001C5.685 13.0001 3 10.3151 3 7.00014C3 3.68514 5.685 1.00014 9 1.00014C12.315 1.00014 15 3.68514 15 7.00014C15 10.3151 12.315 13.0001 9 13.0001ZM18.2463 3.18464C18.732 4.36038 19 5.64897 19 7.00014C19 8.35131 18.732 9.6399 18.2463 10.8156L16.5694 9.59607C16.8485 8.78206 17 7.90879 17 7.00014C17 6.09149 16.8485 5.21821 16.5694 4.4042L18.2463 3.18464ZM21.5476 0.783691C22.4773 2.65664 23 4.76735 23 7.00014C23 9.23293 22.4773 11.3436 21.5476 13.2166L19.9027 12.0203C20.6071 10.493 21 8.79243 21 7.00014C21 5.20785 20.6071 3.50733 19.9027 1.98002L21.5476 0.783691Z" />
                            </svg>
                            <span class="{{ (Route::is('dosen.index'))? 'text-white' : '' }} ms-3 font-semibold text-gray-500 group-hover:text-white text-lg">Dosen</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('mahasiswa.index') }}"
                        class="{{ (Route::is('mahasiswa.index'))? 'bg-indigo-900' : '' }} flex items-center p-3 m-4 rounded-lg hover:bg-indigo-900 group">
                        <svg class="{{ (Route::is('mahasiswa.index'))? 'text-white' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white"
                        aria-hidden="true" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 10C14.2091 10 16 8.20914 16 6C16 3.79086 14.2091 2 12 2C9.79086 2 8 3.79086 8 6C8 8.20914 9.79086 10 12 10ZM5.5 13C6.88071 13 8 11.8807 8 10.5C8 9.11929 6.88071 8 5.5 8C4.11929 8 3 9.11929 3 10.5C3 11.8807 4.11929 13 5.5 13ZM21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8C19.8807 8 21 9.11929 21 10.5ZM12 11C14.7614 11 17 13.2386 17 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5 15.9999C5 15.307 5.10067 14.6376 5.28818 14.0056L5.11864 14.0204C3.36503 14.2104 2 15.6958 2 17.4999V21.9999H5V15.9999ZM22 21.9999V17.4999C22 15.6378 20.5459 14.1153 18.7118 14.0056C18.8993 14.6376 19 15.307 19 15.9999V21.9999H22Z" />
                            </svg>
                            <span class="{{ (Route::is('mahasiswa.index'))? 'text-white' : '' }} ms-3 font-semibold text-gray-500 group-hover:text-white text-lg">Mahasiswa</span>
                    </a>
                </li>
                <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        <li href="route('auth.logout')"
                            onclick="event.preventDefault();
                    this.closest('form').submit();">
                            <div
                                class="{{ (Route::is('auth.logout'))? 'bg-red-700' : '' }} flex items-center p-3 m-4 rounded-lg hover:bg-red-700 group">
                                <svg class="{{ (Route::is('auth.logout'))? 'text-white' : '' }} flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white "
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 18 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                                </svg>
                                <span class="{{ (Route::is('auth.logout'))? 'text-white' : '' }} ms-3 font-semibold text-gray-500 group-hover:text-white text-lg">Sign Out</span>
                            </div>
                        </li>
                    </form>
                </ul>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-72">
        <main class="container-fluid bg-blue-300s">
            <div class="container z-100">
                {{ $slot }}
                {{-- <x-partials.footer></x-partials.footer> --}}
            </div>
        </main>
    </div>



</body>
@stack('script')

</html>
