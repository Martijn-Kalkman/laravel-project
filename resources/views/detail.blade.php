@include('app')

Anime Detail

<h1>{{ $anime->name }}</h1>
<p>{{ $anime->description }}</p>


<a href="{{ url('/animelist') }}" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-sky-200 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Profile</a>

{{-- <a href="{{ route('animeDetail', ['anime' => $anime->id]) }}">Back to Anime List</a> --}}
