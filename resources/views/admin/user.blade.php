@include('app')



    <div class="container mx-auto bg-red-600 w-screen h-96">
        <h1>User List</h1>
            <ul>
                @foreach ($users as $user)
                    <li>{{ $user->name }}</li>
                @endforeach
            </ul>
    </div>