<div class="text-center">

    @if ($cast['profile_path']) 
    <div class="mt-2">

        <img
            class="w-80 rounded-xl mx-auto "
            src="https://image.tmdb.org/t/p/w300/{{$cast['profile_path']}}"
            alt=""
        />

    </div>

    <div class="mt-2">
        <div>
            {{$cast['name']}}
        </div>

        <div class="text-sm text-gray-400 pt-1">
            {{$cast['character']}}
        </div>
    </div>
    @endif
</div>