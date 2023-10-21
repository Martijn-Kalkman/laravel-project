@include('app')

<div class=" flex-grow">
<div class="flex flex-col">
    @if (session('success'))
    <div class="bg-[#DC3545] text-xl h-24 text-white p-8">
        {{ session('success') }}
    </div>
@endif


<div class="container mx-auto">
    <h1 class="font-bold text-2xl pt-8 pb-2">Users List</h1>

    <div class="overflow-x-auto">
    <table class="w-full text-sm text-left">
    <thead class="text-xs uppercase bg-slate-300  border-2 border-solid border-black">
        <tr class="text-[1.3em]">
            <th scope="col" class="px-6 py-3">
                ID
            </th>
            <th scope="col" class="px-6 py-3">
                Naam
            </th>
            <th scope="col" class="px-6 py-3">
                Email
            </th>
            <th scope="col" class="px-6 py-3">
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr class=" border-b text-[1.2em]  dark:border-gray-700">
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
                    <button type="submit" class="btn bg-[#DC3545] rounded-xl text-white py-2 px-3 btn-danger">Verwijderen</button>
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


