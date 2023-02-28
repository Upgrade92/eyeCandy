<x-layout>

    {{-- Actor Info Section --}}
    <div class="movie-info border-b-4 border-stone-600 gap-8 ">

        <div class="container mx-auto pt-16 flex flex-col md:flex-row col gap-1">
            <div class="flex-none md:ml-16 mx-auto pb-12">
                
                {{-- Actor Image --}}
                <img
                    class="w-76 rounded-xl mb-6 md:mb-0 resize-none "
                    src="{{$actor['profile_path']}}"
                    alt="actor_image"
                />
                
                {{-- Social Links --}}
                <ul class="flex items-center mt-4 gap-4 text-2xl">

                    @if($social['facebook'])
                        <li>
                            <a href="{{$social['facebook']}}" title="Facebook" target="_blank">
                                <i class="fa-brands fa-facebook text-eyecandy scale-95 hover:scale-105 ease-in-out duration-300"></i>
                            </a>
                        </li>
                    @endif

                    @if($social['instagram'])
                        <li>
                            <a href="{{$social['instagram']}}" title="Instagram" target="_blank">
                                <i class="fa-brands fa-instagram text-eyecandy scale-95 hover:scale-105 ease-in-out duration-300"></i>
                            </a>
                        </li>
                    @endif

                    @if($social['twitter'])
                        <li>
                            <a href="{{$social['twitter']}}" title="Twitter" target="_blank">
                                <i class="fa-brands fa-twitter text-eyecandy scale-95 hover:scale-105 ease-in-out duration-300"></i>
                            </a>
                        </li>
                    @endif

                    @if($actor['homepage'])
                        <li>
                            <a href="{{$actor['homepage']}}" title="Website" target="_blank">
                                <i class="fa-solid fa-globe text-eyecandy scale-95 hover:scale-105 ease-in-out duration-300"></i>
                            </a>
                        </li>
                    @endif

                </ul>
            </div>
           
            {{-- Actor Info --}}
            <div class="px-6 mx-0 md:px-0 md:mx-2 md:pl-6">

                <h2 class="text-4xl font-semibold text-eyecandy">{{$actor['name']}}</h2>

                <div>
                    
                    <p class="mt-5">
                        <span class="text-eyecandy">
                            <i class="fa-solid fa-cake-candles"></i>
                        </span> 
                        <span class="ml-4">
                            {{$actor['birthday']}} ({{$actor['age']}} years old) in {{$actor['place_of_birth']}}
                        </span>
                    </p>      

                    <p class="mt-10 overflow-hidden pr-12">
                        {{$actor['biography']}}
                    </p>
                    
                    
                </div>
                
            </div>
 
        </div>

        {{-- Known For --}}
        <div class="container mx-auto">
        <h4 class="font-semibold text-eyecandy text-xl pb-6 pl-12">Known For</h4>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 pb-12">
            
            @foreach ($knownFor as $title)
            
                <div class=" mx-auto w-32 mt-4 text-center bg-stone-800 rounded-xl hover:border-2 hover:border-eyecandy hover:scale-105 ease-in-out duration-300">

                    <a href="{{$title['linkToPage']}}" title="{{$title['title']}}">

                        <img 
                            class="rounded-t-xl mx-auto"
                            src="{{$title['poster_path']}}" 
                            alt="movie_img" 
                        >
                        <div class="text-eyecandy pt-1 truncate p-2">
                            {{$title['title']}}
                        </div>

                    </a>

                </div>
            
            @endforeach

        </div>

    </div>
    
    {{-- Credits Section --}}
    <div class="credits border-stone-600">

        <div class="container mx-auto px-20 py-16">

            <h2 class="text-4xl font-semibold text-eyecandy pb-12 pl-12 md:pl-8">
                Credits
            </h2>
            
            <ul class="list-disc leading-loose lg:pl-32 xl:pl-48 2xl:pl-64 my-8">
                @foreach ($credits as $credit)
                    <li> 
                        <span class="font-semibold">{{$credit['release_year']}}</span>
                        &nbsp<i class="fa-solid fa-minus"></i>&nbsp
                        <span class="text-eyecandy">{{$credit['title']}}</span>
                        {{$credit['character']}}       
                    </li>
                @endforeach 
            </ul>

        </div>

    </div>

</x-layout>