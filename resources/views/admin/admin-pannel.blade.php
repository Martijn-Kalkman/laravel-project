@include('app')

<div class="container w-3/12 mx-auto p-4 rounded-lg">
    <form method="POST" action="/admin-pannel" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

        <div class="mb-4">
            <label for="name" class="block text-white">Naam:</label>
            <input required type="text" name="name" id="name" class="w-full p-2 rounded-lg bg-white text-black focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-white">Beschrijving:</label>
            <textarea name="description" id="description" class="w-full p-2 rounded-lg bg-white text-black focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-white">Image:</label>
            <input type="file" name="image" id="image" class="w-full p-2 rounded-lg bg-white text-black focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div class="mb-4">
            <label for="category" class="block text-white">Categorieën:</label>
            <select required name="categories[]" id="categories" class="w-full p-2 rounded-lg bg-white text-black focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option value="action">Action</option>
                <option value="horror">Horror</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        

        <button type="submit" class="bg-blue-500 text-white rounded-lg p-2 px-4 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            Anime toevoegen
        </button>
    </form>
</div>
