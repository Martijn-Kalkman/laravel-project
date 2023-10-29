@include('app')

<div class="container mx-auto mt-8 text-white">
<h2 class="text-center text-2xl font-bold">Welkom {{ Auth::user()->name }}</h2>

<div class="flex flex-row">
    
<form method="POST" action="{{ route('update.name') }}">
    @csrf

    <div class="form-group row">
        <label>update name</label>

            <input id="name" class="bg-gray-200" type="text" name="name">
    </div>

            <button type="submit">
                Update Name
            </button>
</form>

</div>
<h2>Your Anime List</h2>
<ul>
    @foreach (Auth::user()->animes as $anime)
    <li>

        <form method="POST" action="{{ route('anime.update', ['anime' => $anime->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <p class="font-bold text-center text-2xl">Update anime: {{ $anime->name }}</p>
            <div class="flex flex-col w-6/12 mx-auto">
            <label for="name">Naam:</label>
            <input class="text-black" type="text" name="name" value="{{ $anime->name }}" id="name">

            <label for="description">Beschrijving:</label>
            <textarea class="text-black" name="description" id="description">{{ $anime->description }}</textarea>

            <label for="image">Image:</label>
            <input type="file" name="image" id="image">

            <button class="text-white w-6/12 mx-auto right-2.5 bottom-2.5 bg-slate-600 hover:bg-blue-500 font-medium rounded-lg text-sm px-4 py-2 " type="submit">Update Anime</button>
        </form>
    </li>

    <form action="{{ route('userAnimedelete', $anime->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-[#DC3545] rounded-xl text-white py-2 px-3 btn-danger">Delete</button>
    </form>
@endforeach
</ul>
</div>



