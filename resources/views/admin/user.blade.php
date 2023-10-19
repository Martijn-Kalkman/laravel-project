@include('app')

<div class=" flex-grow">
<div class="flex flex-col">
    @if (session('success'))
    <div class="bg-red-600 h-32">
        {{ session('success') }}
    </div>
@endif


<div class="container">
    <h1>User List</h1>
    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->name }}
                <form action="{{ route('userDelete', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
</div>
</div>


