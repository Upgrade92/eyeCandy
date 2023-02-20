{{-- <div {{$attributes->merge(['class' => 'mt-8 bg-stone-600 pb-3 rounded-xl hover:scale-105'])}}> --}}
<div class="mt-8 bg-stone-600 pb-3 rounded-xl scale-90 hover:scale-100 hover:border-2 hover:border-eyecandy ease-in-out duration-100">
    <a href="/listings/{{$movie['id']}}" class="">
        
        <img
            class=" mb-6 rounded-t-xl mx-auto"
            src="https://image.tmdb.org/t/p/w500/{{$movie['poster_path']}}"
            alt=""
        />

        <div class="px-4 pb-5">
            <h3 class="text-center text-lg text-eyecandy font-semibold">{{$movie['title']}}</h3>
            <div class="">
                {{-- <p class="text-xs mt-5">Duration : 128:26</p> --}}
                <p class="text-sm pt-3">
                    <span class="text-eyecandy">Released:</span> {{\Carbon\Carbon::parse($movie['release_date'])->format('M d Y')}}</p>
                
                <p class="text-sm">
                    <span class="text-eyecandy">Genres:</span>
                    @foreach ($movie['genre_ids'] as $genre ) 
                        {{$genres->get($genre)}}@if(!$loop ->last),@endif
                    @endforeach</p>
                <p class="text-sm">
                    <span class="text-eyecandy">Raiting:</span> {{$movie['vote_average'] *10}} % 
                    <i class="fa-solid fa-star text-orange-500"></i>
                </p>

            </div>
        </div>
    </a>
</div>