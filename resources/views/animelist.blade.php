@include('app')


Welkom {{ Auth::user()->name }}


<form method="POST" action="{{ route('update.name') }}">
    @csrf

    <div class="form-group row">
        <label>update name</label>

            <input id="name" class="bg-gray-200" type="text" name="name" required>
    </div>

            <button type="submit">
                Update Name
            </button>
</form>

