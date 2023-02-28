<div class="text-center ">

    @if ($cast['profile_path']) 

        <a href="/actors/{{$cast['id']}}">
            <div class="mt-2 bg-stone-800 rounded-xl hover:scale-105 ease-in-out duration-300 w-40">

                <img
                    class="rounded-t-xl mx-auto "
                    src="https://image.tmdb.org/t/p/w300/{{$cast['profile_path']}}"
                    alt=""
                />

                <div class="p-1">
                    
                    <div class=" text-eyecandy">
                        {{$cast['name']}}
                    </div>

                    <div class="text-sm "">
                        {{$cast['character']}}

                    </div>
                </div>

            </div>
        </a>
        
    @endif
    
</div>