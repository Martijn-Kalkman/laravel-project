@include('app')

<div class="p-4">
    <div class="container mx-auto text-white">
        <h1 class="text-2xl font-semibold">Animelist</h1>

    <div class="flex flex-wrap -mx-4">
        @foreach ($animes as $anime)
            <div class="w-1/4 px-4 mb-4">
                <a href="{{ route('animeDetail', ['anime' => $anime->id]) }}" class="block bg-black p-4 rounded shadow hover:shadow-lg transition duration-300">
                    <h2 class="text-lg font-semibold mb-2">{{ $anime->name }}</h2>
                    <p>{{ $anime->description }}</p>
                    <p>{{ $anime->user_id }}</p>
                </a>
            </div>
        @endforeach
    </div>
    </div>
</div>
