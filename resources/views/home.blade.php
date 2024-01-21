@include('app')

<div class="flex-grow">
    <div class="flex flex-col">
        @if (session('error'))
            <div class="bg-[#DC3545] text-xl h-24 text-white p-8">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>

<div class="container mx-auto justify-center mt-8">
    <div class="flex flex-row m-4">
        <div class="w-8/12 bg-white rounded-xl p-8">

            <h1 class="text-center font-bold text-6xl">Welkom op Alist!</h1>

        </div>
        <div class="m-4 w-3/12">
            <img class="rounded" src="{{ asset('images/cover.jpg') }}" alt="description of my image">
        </div>
    </div>
</div>
