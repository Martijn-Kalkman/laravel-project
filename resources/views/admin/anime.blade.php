@include('app')

<div class="flex-grow">
    <div class="flex flex-col">
        @if (session('success'))
            <div class="bg-[#DC3545] text-xl h-24 text-white p-8">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="container mx-auto w-screen h-96">
        <div class="container mx-auto">
            <h1 class="font-bold text-2xl pt-8 pb-2 text-white">Anime List</h1>

            <div class="overflow-x-auto max-h-[40rem] text-white">
                <table class="w-full text-sm text-left">
                    <thead class="sticky top-0 z-50 mt-[30px]">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                    </thead>

                    <tbody>
                        @foreach ($animes as $anime)
                            <tr class="border-b text-[1.2em]">
                                <td class="px-6 py-4">
                                    {{ $anime->id }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $anime->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $anime->description }}
                                </td>
                                <td>
                                    <img class="w-12  rounded" src="{{ asset($anime->image) }}"
                                        alt="{{ $anime->name }}">
                                </td>
                                <td>
                                    <?php if($anime->status == '1') {?>
                                    <form action="{{ route('animeToggle', $anime->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="2">
                                        <button class="bg-blue-600 rounded-xl px-4 py-2 mt-2 mb-2"
                                            type="submit">Aan</button>
                                    </form>
                                    <?php } else { ?>
                                    <form action="{{ route('animeToggle', $anime->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="1">
                                        <button class="bg-blue-600 rounded-xl px-4 py-2 mt-2 mb-2"
                                            type="submit">Uit</button>
                                    </form>
                                    <?php } ?>
                                </td>


                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
