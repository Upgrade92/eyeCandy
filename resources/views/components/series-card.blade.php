<div class="mt-8 bg-stone-600 pb-16 rounded-xl scale-90 hover:scale-100 hover:border-2 hover:border-eyecandy ease-in-out duration-100">
    <a href="/series/{{$tvshow['id']}}" class="">
        
        <img
            class=" mb-6 rounded-t-xl mx-auto"
            src="{{ $tvshow['poster_path'] }}"
            alt="poster"
        />

        <div class="px-4 pb-8">

            <h3 class="text-center text-lg text-eyecandy font-semibold">{{$tvshow['name']}}</h3>
            <div class="px-2 text-right">

                <div class="grid grid-cols-6 py-4 absolute inset-x-0 bottom-0 h-22 px-3">

                    <div class="col-start-1 col-end-2">
                        <span class="text-eyecandy">Raiting:</span>
                    </div>
                    <div class="col-end-7 col-span-4">
                        {{$tvshow['vote_average']}}  
                        <i class="fa-solid fa-star text-orange-500"></i>
                    </div>

                    <div class="col-start-1 col-end-2">
                        <span class="text-eyecandy">Released:</span>
                    </div>
                    <div class="col-end-7 col-span-4"> 
                        {{$tvshow['first_air_date']}}
                    </div>

                    <div class="col-start-1 col-end-2">
                        <span class="text-eyecandy">Genre(s):</span>
                    </div>
                    <div class="col-end-7 col-span-4 truncate"> 
                        {{ $tvshow['genres']}}
                    </div>

                </div>
                
            </div>

        </div>

    </a>
</div>