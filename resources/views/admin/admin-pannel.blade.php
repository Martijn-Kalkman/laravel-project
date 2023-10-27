@include('app')



<div class=" container bg-red-600  w-10/12 mx-auto ">
    <form method="POST" action="/admin-pannel">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>
        <button type="submit">Add Anime</button>
    </form>

</div>