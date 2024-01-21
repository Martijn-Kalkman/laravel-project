@include('app')

<div class="flex-grow">
    <div class="flex flex-col">
        @if (session('success'))
            <div class="bg-[#DC3545] text-xl h-24 text-white p-8">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>

<div class="container mx-auto mt-8 text-white">
    <h2 class="text-center text-2xl font-bold">Welcome {{ Auth::user()->name }}</h2>

    <div class="flex flex-row items-center justify-center space-x-4 mt-4">
        <form method="POST" action="{{ route('update.name') }}" class="flex items-center">
            @csrf

            <div class="form-group">
                <input id="name" class="bg-gray-200 p-2 rounded" type="text" name="name">
            </div>

            <button type="submit" class="bg-blue-500 ml-2 text-white px-4 py-2 rounded">
                Update Name
            </button>
        </form>
    </div>


    <h2 class="mt-8 mb-4 text-2xl font-bold text-center">Your Anime List</h2>

    <ul class="w-[500px] mx-auto">
        @foreach (Auth::user()->animes as $anime)
            <li class="mb-8">
                <form method="POST" action="{{ route('anime.update', ['anime' => $anime->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <p class="font-bold text-center text-2xl mb-4">Update anime: {{ $anime->name }}</p>

                    <div class="flex flex-col w-full mx-auto space-y-4">
                        <label for="name">Name:</label>
                        <input class="text-black p-2 border rounded" type="text" name="name"
                            value="{{ $anime->name }}" id="name">

                        <label for="description">Description:</label>
                        <textarea class="text-black p-2 border rounded" name="description" id="description">{{ $anime->description }}</textarea>

                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="mb-2">

                        <button class="bg-slate-600  mx-auto hover:bg-blue-500 text-white rounded-lg px-4 py-2"
                            type="submit">Update Anime</button>
                    </div>
                </form>

                <form action="{{ route('userAnimedelete', $anime->id) }}" method="POST" class="text-center">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-[#DC3545] w-auto rounded-lg text-white py-2 px-3 mt-4 mx-auto">
                        Delete
                    </button>
                </form>

            </li>
        @endforeach
    </ul>
</div>
