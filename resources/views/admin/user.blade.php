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
                <h1 class="font-bold text-2xl pt-8 pb-2 text-white">Users List</h1>

                <div class="overflow-x-auto max-h-[40rem] text-white">
                    <table class="w-full text-sm text-left">
                        <thead class=" sticky top-0 z-50 mt-[30px]">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-b text-[1.2em] ">
                                    <td class="px-6 py-4">
                                        {{ $user->id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('userDelete', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-[#DC3545] rounded-xl text-white py-2 px-3 btn-danger">Verwijderen</button>
                                        </form>
                                    </td>
                                    <td>
                                        <button
                                            class="btn-update btn bg-[#803bff] rounded-xl text-white py-2 px-3"
                                            onclick="update({{ $user->id }})">Update</button>
                                    </td>
                                </tr>
                                <tr id="update-{{ $user->id }}" class="hidden">
                                    <td></td>
                                    <td colspan="4">
                                        <form method="POST" class="my-8 w-auto"
                                            action="{{ route('userUpdate', $user->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <label class="text-[1.2em]" for="name">Verander naam naar:</label>
                                            <input class="text-[1.2em] text-black border-solid border-2 border-black"
                                                type="text" name="name" value="{{ $user->name }}">
                                            <button type="submit"
                                                class="text-[1.2em] btn-update btn bg-[#803bff] rounded-xl text-white py-2 px-3 btn-danger">Update
                                                Name</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



<script>
    function update(userId) {
        var updateRow = document.getElementById('update-' + userId);
        updateRow.classList.toggle('hidden');
    }
</script>
