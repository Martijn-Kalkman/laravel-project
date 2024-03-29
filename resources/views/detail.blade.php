@include('app')

<div class="container mx-auto text-white">
    <h2 class="text-center font-bold text-2xl">Anime Details</h2>

    @if ($anime->status == 0)
        <p class="text-center text-xl font-bold">Deze pagina is gesloten!</p>
    @else
        <div class="">
            <p>Anime naam: <span class="font-bold">{{ $anime->name }}</span></p>
            <p>Anime description: <span class="font-bold">{{ $anime->description }}</span></p>
            <p>Anime gemaakt op: <span class="font-bold">{{ $anime->created_at }}</span></p>
            <p>Image naam: <span class="font-bold">{{ $anime->image }}</span></p>
            <p>Post gemaakt door: <span class="font-bold">{{ $anime->user->name }}</span></p>
            <p>Anime image:
            <p><img class="w-96 rounded" src="{{ asset($anime->image) }}" alt="{{ $anime->name }}">
        </div>
    @endif

    <div class="mt-8">
        <a href="{{ url('/animelist') }}"
            class="text-white right-2.5 bottom-2.5 bg-slate-600 hover:bg-blue-500 font-medium rounded-lg text-sm px-4 py-2">Terug
            naar Animelist</a>
    </div>
</div>
