<x-layout>


    {{-- Title Info Section --}}
    <div class="listing-info border-b-4 border-stone-600 gap-8">

        <div class="container mx-auto py-16 px-20 flex flex-col md:flex-row justify-center items-center col gap-12">
            
            @if ($details['poster_path'])
                <img
                    class="min-w-80 rounded-xl  mb-6 md:mb-0 resize-none "
                    src="https://image.tmdb.org/t/p/w500/{{$details['poster_path']}}"
                    alt=""
                />
            @else
                <img
                    class="min-w-80 rounded-xl  mb-6 md:mb-0 resize-none "
                    src="{{asset('/images/no-cover.png')}}"
                    alt=""
                />  
            @endif
           
            
            

            <div class="px-10 mx-0 md:px-0 md:mx-10 ">

                <h2 class="text-4xl font-semibold text-eyecandy">{{$details['title']}}</h2>

                <div>
                    
                    <p class="text-sm mt-5">
                        <span class="text-eyecandy">Duration:</span> {{$details['runtime']}}min
                    </p>
                    <p class="text-sm">
                        <span class="text-eyecandy">Releasesd:</span> {{\Carbon\Carbon::parse($details['release_date'])->format('M d Y')}}
                    </p>
                    <p class="text-sm">
                        <span class="text-eyecandy">Genres:</span>
                        @foreach ($details['genres'] as $genre)
                            {{$genre['name']}}@if(!$loop ->last),@endif
                        @endforeach    
                    </p>
                    <p class="text-sm">
                        <span class="text-eyecandy">Raiting:</span> {{number_format($details['vote_average'] * 10, 0)}}% <i class="fa-solid fa-star text-orange-500"></i>
                        </p>
                    <p class="mt-10">
                        {{$details['overview']}}
                    </p>

                    <div class="mt-16">	

                        <h3 class="font-semibold text-2xl text-eyecandy">
                            Featured Cast
                        </h3>

                        <div class="flex mt-4">

                            @foreach ($details['credits']['crew'] as $crew )
                                @if($loop->index < 3)

                                <div class="">
                                    <div class="mr-8">
                                        <div>
                                            {{$crew['name']}}
                                        </div>

                                        <div class="text-sm text-gray-400 pt-1">
                                            {{$crew['job']}}
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach

                        </div>
                        
                        @if ($details["videos"]["results"])
                            

                        {{-- Add List - no function yet --}}
                        {{-- <div class="mt-12">
                            <a href='' class="w-40 flex items-center bg-eyecandy rounded-xl font-semibold px-5 py-4 hover:scale-110 hover:bg-teal-600 text-black ease-in-out duration-300 ">
                                <i class="fa-solid fa-list"></i>
                                <p class="ml-4">Add to list</p>
                            </a>                         
                            
                        </div> --}}



                        <div x-data="{ isOpen: false }" >
                            <button class="w-40 bg-eyecandy rounded-xl font-semibold px-5 py-4 hover:scale-110 hover:bg-teal-600 text-black mt-4 ease-in-out duration-300 " 
                                    onclick="(function(){ document.getElementById('iframe_video').src = document.getElementById('iframe_video').src; 
                                            window.location.href='#top'; })(); 
                                            
                                            scrollLock(true);" 
                                    @click="isOpen = true"
                                >
                                <i class="fa-solid fa-circle-play"></i>
                                Play Trailer
                            </button>
                            {{-- Video Modal --}}
                            <div class="z-50 absolute top-0 left-0 w-full h-full flex items-center bg-black/75 overflow-y-auto" x-show="isOpen"  
                                @keydown.escape.window="isOpen = false, scrollLock(false)"  @Click="isOpen = false, scrollLock(false)"
                                >
                                <div class=" mx-auto rounded p-4 mt-2 overflow-y-auto">
                                    <div class="bg-stone-800 rounded">
                                        {{-- <h1 class="font-bold text-2xl mb-3">Modal Title</h1> --}}
                                        <div class="modal-body">
                                            <iframe id="iframe_video" width="1280" height="720" src="https://www.youtube.com/embed/{{$details["videos"]["results"]["0"]["key"]}}" frameborder="0" allowfullscreen class="mx-auto rounded-2xl"></iframe>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endif
                        
                        
                    </div>
                    

                </div>

            </div>

        </div>

    </div>
    


    {{-- Actor Section --}}
    <div class="listing-cast border-b-4 border-stone-600">

        <div class="container mx-auto px-20 py-16">

            <h2 class="text-4xl font-semibold text-eyecandy pb-12 pl-12 md:pl-8">
                Cast
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 pb-8 px-6">
            
               @foreach ($details['credits']['cast'] as $cast )
                    @if($loop->index < 5)
                        <x-actor :cast="$cast"></x-actor>
                    @endif
                @endforeach


            </div>

        </div>

    </div>


    
    {{-- Image Section --}}
    @if ($details['images']['backdrops'])

        <div class="images border-b-4 border-stone-600">
            <div class="container mx-auto px-20 py-16 ">

                <h2 class="text-4xl font-semibold text-eyecandy pb-12 pl-12 md:pl-8">
                    Images
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 pb-8">

                @foreach ($details['images']['backdrops'] as $picture )

                        @if($loop->index < 6)
                            <x-image :picture="$picture"></x-image>
                        @endif
                        
                    @endforeach

                </div>

            </div>

        </div>

    @endif



    {{-- Comment section --}}
    <div class="comments">
        <div class="container mx-auto px-20 py-16">

            <h2 class="text-4xl font-semibold text-eyecandy pb-12 pl-12 md:pl-8">
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
            
            @auth
                <div x-data="{ isOpen: false }" >

                    <button class="bg-eyecandy rounded-xl font-semibold px-5 py-4 ml-5 hover:scale-110 hover:bg-teal-600 text-black mt-4 ease-in-out duration-300 " onclick="window.location.href='#top'" @click="isOpen = true, scrollLock(true)"
                        >
                        <i class="fa-solid fa-comment"></i>
                        Comment
                    </button>

                    {{-- Comment Modal --}}
                    <div class="z-50 mx-auto my-auto absolute top-0 left-0 w-full h-full flex items-center bg-black/75 overflow-y-auto" x-show="isOpen" 
                                @keydown.escape.window="isOpen = false, scrollLock(false)" 
                                @click="isOpen = false, scrollLock(false)">
                        <div class="mx-auto rounded-xl p-4 mt-2 overflow-y-auto">
                            <div class="bg-stone-800 rounded ">
                                <div class="modal-body">
                                    <form method="POST" action="/listings/{{$details['id']}}">
                                        @csrf
                                        
                                        <div class="mb-6 p-5 rounded-2xl">
                                            <h3>Post a Comment</h3>
                                            <label for="content" class="inline-block text-lg mb-2 text-eyecandy">
                                                Content
                                            </label>
                                            <textarea
                                                class="border border-gray-200 rounded p-2 w-full text-black"
                                                name="content"
                                                rows="20"
                                            >{{old('content')}}
                                            </textarea>
                        
                                            @error('content')
                                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                            @enderror
                        
                                        </div>

                                        <div class="mb-6 mx-auto">
                                            <button class="bg-eyecandy hover:bg-teal-600 ease-in-out duration-300 text-black rounded py-2 px-4">
                                                Submit
                                            </button>
                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth

            </div>

        </div>
    </div>

</x-layout>