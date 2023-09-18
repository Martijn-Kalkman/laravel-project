{{-- 
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head> --}}

<nav class="bg-[#2E3442]">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-3">
      <a href="{{ url('/') }}" class="flex items-center">
          {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" /> --}}
          <span class="self-center text-3xl font-semibold whitespace-nowrap dark:text-white"><span class="text-[#FB3930] text-4xl">A</span>list</span>
      </a>
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg  md:flex-row md:space-x-8 md:mt-0 md:border-0">
          <li>
            <a href="{{ url('/about-us') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#FB3930] md:p-0 dark:text-white md:dark:hover:text-[#FB3930] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About us</a>
          </li>
          <li>
            <a href="{{ url('/animelist') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-[#FB3930] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Anime list</a>
          </li>
          <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-[#FB3930] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
          </li>
          <li>
            <a href="#" class="bg-[#FB3930] hover:bg-[#7a1a15] text-white font-bold py-2 px-4 rounded">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>