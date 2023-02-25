<x-layout>

    {{-- Series Info Section --}}
    <div class="series-info border-b-4 border-stone-600 gap-8">

        <div class="container mx-auto py-16 flex flex-col md:flex-row justify-center items-center col gap-1">
            
            
            <img
                class="w-96 rounded-xl  mb-6 md:mb-0 resize-none "
                src="{{$details['poster_path']}}"
                alt=""
            />
            

            
           
            <div class="px-10 mx-0 md:px-0 md:mx-10 ">

                <h2 class="text-4xl font-semibold text-eyecandy">{{$details['name']}}</h2>

                <div>
                    
                    <p class="text-sm mt-5">
                        {{-- <span class="text-eyecandy">Duration:</span> {{$details['runtime']}}min --}}
                    </p>
                    <p class="text-sm">
                        <span class="text-eyecandy">First Air:</span> {{$details['first_air_date']}}
                    </p>
                    <p class="text-sm">
                        <span class="text-eyecandy">Genres:</span>
                        {{$details['genres']}}                             
                    </p>
                    <p class="text-sm">
                        <span class="text-eyecandy">Raiting:</span> {{($details['vote_average'])}} <i class="fa-solid fa-star text-orange-500"></i>
                        </p>
                    <p class="mt-10">
                        {{$details['overview']}}
                    </p>


                    {{-- Cast Section --}}
                    <div class="mt-16">	

                        <div class="flex mt-4">

                            @foreach ($details['created_by'] as $crew )

                                <div class="mr-8">
                                    <span class="text-eyecandy">
                                        {{$crew['name']}}
                                    </span>

                                    <div class="text-sm text-gray-400 pt-1">
                                        Creator
                                    </div>
                                </div>

                            @endforeach

                        </div>

                    </div>


                    {{-- Trailer Section --}}
                    <div x-data="{ isOpen: false }">
                        @if (count($details['videos']['results']) > 0)

                            <div class="mt-12">
                                <button
                                    @click="isOpen = true, scrollLock(true)"
                                    class="w-40 bg-eyecandy rounded-xl font-semibold px-5 py-4 hover:scale-110 hover:bg-teal-600 text-black mt-4 ease-in-out duration-300"
                                >
                                    <i class="fa-solid fa-circle-play"></i>
                                    <span class="ml-2">Play Trailer</span>
                                </button>
                            </div>
    
                            {{-- Video Modal --}}
                            <template x-if="isOpen">

                                <div
                                    style="background-color: rgba(0, 0, 0, .9);"
                                    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                                    @Click="isOpen = false, scrollLock(false)"
                                >

                                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">

                                        <div class="bg-stone-900 rounded-xl">

                                            <div class="modal-body">

                                                <div class="responsive-container overflow-hidden relative" style="padding-top: 50%">

                                                    <iframe 
                                                        class="rounded-xl responsive-iframe absolute top-0 left-0 w-full h-full" 
                                                        src="https://www.youtube.com/embed/{{ $details['videos']['results'][0]['key'] }}" 
                                                        style="border:0;" 
                                                        allow="autoplay; encrypted-media" 
                                                        allowfullscreen>
                                                    </iframe>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </template>

                        @endif
                        

                        {{-- Add List - no function yet --}}
                        {{-- <div class="mt-12">
                            <a href='' class="w-40 flex items-center bg-eyecandy rounded-xl font-semibold px-5 py-4 hover:scale-110 hover:bg-teal-600 text-black ease-in-out duration-300 ">
                                <i class="fa-solid fa-list"></i>
                                <p class="ml-4">Add to list</p>
                            </a>                         
                            
                        </div> --}}        
                                              
                    </div>
                    
                </div>

            </div>

        </div>

    </div>
    
    {{-- Cast Section --}}
    <div class="movie-cast border-b-4 border-stone-600">

        <div class="container mx-auto px-20 py-16">

            <h2 class="text-4xl font-semibold text-eyecandy pb-12 pl-12 md:pl-8">
                Cast
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 pb-8 px-6">
            
               @foreach ($details['cast'] as $cast )

                    <x-actor-card :cast="$cast"></x-actor-card>

                @endforeach

            </div>

        </div>

    </div>

    {{-- Image Section --}}
    @if (count($details['images']) > 0)

        <div class="movie-images border-b-4 border-stone-600" x-data="{ isOpen: false, image: ''}">
            <div class="container mx-auto px-20 py-16 ">

                <h2 class="text-4xl font-semibold text-eyecandy pb-12 pl-12 md:pl-8">
                    Images
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 pb-8">

                    @foreach ($details['images'] as $image )

                        <x-image :image="$image"></x-image>
                        
                    @endforeach

                </div>

            </div>

        </div>

    @endif      

    {{-- Comment section --}}
    <div class="movie-comments">
        <div class="container mx-auto px-20 py-16">

            <h2 class="text-4xl font-semibold text-eyecandy pb-12 pl-12 md:pl-8 ml-5">
                Comments
            </h2>

            <div class=" gap-6 pb-8">
                            
            @if (count($comments) > 0)
                
                @foreach ($comments as $comment)

                    <x-comment :comment="$comment">lol</x-comment>
                    
                @endforeach
                
            @else

                <div class='bg-stone-800 border border-stone-600 p-6 mx-5 my-4 rounded-2xl text-center text-xl'>
                    <p>no comments found!</p>
                </div>

            @endif 
            

            {{-- Post Comment Section --}}
            @auth

                <div x-data="{ isOpen: false }">

                    @if (count($details['videos']['results']) > 0)
                        <div class="mt-12">
                            <button
                                @click="isOpen = true, scrollLock(true)"
                                class="w-40 bg-eyecandy rounded-xl font-semibold px-5 py-4 hover:scale-110 hover:bg-teal-600 text-black mt-4 ease-in-out duration-300 ml-5"
                            >
                                <i class="fa-solid fa-comment"></i>
                                <span class="ml-2">Comment</span>
                            </button>
                        </div>

                        {{-- comment Modal --}}
                        <template x-if="isOpen">
                            
                            <div
                                style="background-color: rgba(0, 0, 0, .9);"
                                class="fixed top-0 left-0 w-full h-full flex items-center  overflow-y-auto"
                            >
                                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">

                                    <div class="bg-stone-900 rounded-xl">
                                        <div class="flex justify-end mr-4">
                                            <button
                                                @click="isOpen = false, scrollLock(false)"
                                                @keydown.escape.window="isOpen = false, scrollLock(false)"
                                                class="text-3xl hover:text-eyecandy ease-in-out duration-300">x
                                            </button>
                                        </div>

                                        <div class="modal-body px-4 pb-1">
                                            
                                            <form method="POST" action="/movies/{{$details['id']}}" >
                                                @csrf
                                                
                                                <div class="mb-6 rounded-2xl text-center">
                                                    
                                                    <h3 class="text-xl text-eyecandy mb-5">Post a Comment</h3>
                                                   
                                                    <textarea
                                                        class="border border-gray-200 rounded p-2 w-full text-black"
                                                        name="content"
                                                        rows="20"
                                                    >
                                                    </textarea>
                                
                                                    @error('content')
                                                        <p class="text-red-500 mt-1">{{$message}}</p>
                                                    @enderror
                                                    

                                                    <div class="flex mb-6 mx-auto justify-center">
                                                        <button class="w-full bg-eyecandy hover:bg-teal-600 ease-in-out duration-300 text-black rounded py-2 mt-2">
                                                            Submit
                                                        </button>
                                        
                                                    </div>

                                                </div>
                                                
                                            </form>

                                        </div>

                                    </div>

                                </div>
                            </div>

                        </template>
                    @endif

                </div>

            @endauth

        </div>

    </div>

</x-layout>