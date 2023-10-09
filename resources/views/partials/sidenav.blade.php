
<nav class="bg-[#383B42] w-2/12 h-screen">
    <ul class="">
        <li class="bg-[#bae5fd4d] hover:cursor-pointer text-white mb-1 rounded hover:bg-[#5998b9] border-b-1 border-black py-2 px-4">Users  </li>
        <li class="bg-[#bae5fd4d] hover:cursor-pointer text-white mb-1 rounded hover:bg-[#5998b9] border-b-1 border-black py-2 px-4">Test</li>

    </ul>
    <div class="bottom-0 absolute text-white border-t-2 w-2/12 border-white ">
        <p class="mx-2 text-center my-5">Welkom {{ Auth::user()->name }}
    </p>    
    </div>
</nav>