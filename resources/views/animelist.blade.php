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

<div class="p-4">
    <div class="container mx-auto text-white">
        <h1 class="text-2xl font-semibold mb-4">Animelist</h1>

        <form action="{{ route('animeSearch') }}" method="GET">
            <div class="flex mb-8">
                <div class="relative mr-4">
                    <input type="search" name="search" id="default-search" value="{{ request('search') }}" class="block w-500 p-4 pl-10 text-sm text-black rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-black dark:placeholder-black dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for anime..." >
                </div>
                <div class="relative">
                    <label for="category" class="sr-only">Select Category</label>
                    
                    <select name="category" id="category" class="block w-40 p-4 text-sm text-black rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-black dark:placeholder-black dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">All Categories</option>
                        
                        <option value="action" {{ request('category') === 'action' ? 'selected' : '' }}>Action</option>
                        <option value="horror" {{ request('category') === 'horror' ? 'selected' : '' }}>Horror</option>
    
                        <!-- Add more options for different categories -->
                    </select>
                </div>
                <button type="submit" class="text-white bg-slate-600 hover:bg-blue-500 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </form>

        <div class="flex flex-wrap -mx-4">
            @foreach ($animes as $anime)
                @if($anime->status) <!-- Only display if status is 'On' -->
                    <div class="w-1/4 px-4 mb-4">
                        <div class="rounded border-2 border-solid border-white">
                            <h2 class="text-lg text-center font-bold border-b-2 border-white mb-2">{{ $anime->name }}</h2>
                            <img src="{{ asset($anime->image) }}" alt="{{ $anime->name }}">
                            <a href="{{ route('animeDetail', ['anime' => $anime->id]) }}" class="block text-center hover:bg-slate-600 bg-black p-4 rounded shadow hover:shadow-lg transition duration-300">
                                Click for more information
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
