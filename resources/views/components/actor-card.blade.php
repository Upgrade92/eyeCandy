<div class="actor mt-6 text-center bg-stone-600 pb-3 scale-90 rounded-xl hover:scale-95 ease-in-out hover:border-eyecandy hover:border-2 duration-300">

    <a href="/actors/{{$actor['id']}}">

        <img
            class="w-96 rounded-xl mx-auto "
            src="{{$actor['profile_path']}}"
            alt=""
        />
    
        <div class="mt-2 px-3">

            <a href="/actors/{{$actor['id']}}" class="text-2xl text-semibold"><span class="text-eyecandy">{{$actor['name']}}</span></a>
            <div class="text-lg truncate">
                {{$actor['known_for']}}
            </div>

        </div>
    </a>    
</div>