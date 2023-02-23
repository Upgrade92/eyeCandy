<nav class="bg-stone-800 py-2 rounded-b-2xl border-b border-gray-700 z-10">

    <div class="mx-4 flex flex-col md:flex-row px-3 justify-between">

        <ul class="flex flex-col md:flex-row items-center">

            <li class="pr-12 top-4 md:pr-0">
                <a href="/" class="flex hover:text-eyecandy ease-in duration-300">
                    <img class="mx- w-14" src="{{asset('images/eye-candy.png')}}" alt="">
                    <span class="mt-4">EyeCandy</span>
                </a>
            </li>

            <li class="md:ml-16 mt-1 text-center">
                <a href="/" class="hover:text-eyecandy ease-in duration-300"> 
                    <i class="fa-solid fa-film"></i>
                    Movies
                </a>
            </li>

            <li class="md:ml-6 mt-1 text-center">
                <a href="/" class="hover:text-eyecandy ease-in duration-300"> 
                    <i class="fa-solid fa-clapperboard"></i>
                    Series
                </a>
            </li>

            <li class="md:ml-6 mt-1 text-center">
                <a href="/" class="hover:text-eyecandy ease-in duration-300">
                    <i class="fa-solid fa-user"></i> 
                    Actors
                </a>
            </li>
        </ul>

        
        <div class="flex flex-col md:flex-row items-center justify-between mt-2 md:mt-0">
            
            <livewire:search-dropdown>

            @auth
            <div class="mx-4 flex my-3 md:my-0">
                
                <a href="/profile" title="My profile">
                    <img class="mx-3  w-11 rounded-full hover:scale-110 ease-in duration-300" src="{{asset(auth()->user()->profile_img)}}" alt="">
                </a>

                <form class="inline ml-5 my-auto hover:text-eyecandy ease-in duration-300" action="/logout" method="POST">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i>
                        Logout
                    </button>
                
                </form>
            </div>
            @else
            <ul class="flex items-center mt-2 md:mt-0">
                <li class="text-center mx-3">
                    <a href="/register" class="hover:text-eyecandy ease-in duration-300">
                        <i class="fa-solid fa-user-plus"></i> 
                        Register
                    </a>
                </li>
                <li class="text-center mx-3">
                    <a href="/login" class=" hover:text-eyecandy ease-in duration-300">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login
                    </a>
                </li>
            </ul>
            @endauth
        </div>

    </div>
</nav>