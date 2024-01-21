



<nav class="bg-[#383b42] h-[4rem]">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-3">
        <a href="{{ url('/') }}" class="flex items-center">
            <span class="self-center text-3xl font-semibold whitespace-nowrap dark:text-white"><span
                    class="text-sky-200 text-4xl">A</span>list</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg  md:flex-row md:space-x-8 md:mt-0 md:border-0">
                <li>
                    <a href="{{ url('/animelist') }}"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-sky-200 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Anime
                        list</a>
                </li>

                @if (Auth::check() && Auth::user()->role == '0')
                    <li>
                        <a href="{{ url('/create') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-sky-200 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Create
                            anime</a>
                    </li>
                    <li>
                        <a href="{{ url('/profile') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-sky-200 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Profile</a>
                    </li>
                @endif

                @if (Auth::check())
                    <li>
                        <a href="{{ route('logout') }}"
                            class="py-2 px-4 text-sky-200 border-2 rounded-lg border-sky-200 shadow-[0_0_2px_#fff,inset_0_0_2px_#fff,0_0_5px_#08f,0_0_15px_#08f,0_0_30px_#08f] hover:bg-sky-600 hover:text-white -600"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <li>
                        <a href="{{ route('login') }}"
                            class=" py-2 px-4 text-sky-200 border-2 rounded-lg border-sky-200 shadow-[0_0_2px_#fff,inset_0_0_2px_#fff,0_0_5px_#08f,0_0_15px_#08f,0_0_30px_#08f] hover:bg-sky-600 hover:text-white -600"
                            onclick="logout()">Login</a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-sky-200 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">register</a>
                    </li>
                @endif

                @if (Auth::check() && Auth::user()->role == '1')
                    <li>
                        <a href="{{ url('/admin-pannel') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-sky-200 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Admin
                            pannel</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</nav>

@if (request()->is('users') || request()->is('admin-pannel') || request()->is('anime'))
    <div class="flex flex-row">
        <nav class="bg-[#383B42] w-2/12 h-screen mt-[-4em]">
            <ul class="mt-[4em]">

                <a href="{{ url('/admin-pannel') }}">
                    <li
                        class="bg-[#bae5fd4d] hover:cursor-pointer text-white mb-1 rounded hover:bg-[#5998b9] border-b-1 border-black py-2 px-4">
                        Admin pannel

                    </li>
                </a>

                <a href="{{ url('/users') }}">
                    <li
                        class="bg-[#bae5fd4d] hover:cursor-pointer text-white mb-1 rounded hover:bg-[#5998b9] border-b-1 border-black py-2 px-4">
                        Users

                    </li>
                </a>
                <a href="{{ url('/anime') }}">
                    <li
                        class="bg-[#bae5fd4d] hover:cursor-pointer text-white mb-1 rounded hover:bg-[#5998b9] border-b-1 border-black py-2 px-4">
                        Animes</li>
                </a>
            </ul>
            <div class="bottom-0 absolute text-white border-t-2 w-2/12 border-white ">
                <p class="mx-2 text-center my-5">Welkom {{ Auth::user()->name }}
                </p>
            </div>
        </nav>
@endif
