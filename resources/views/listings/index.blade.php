<x-layout>
    @include('partials._hero')

    {{-- Popular Movies --}}
    <div class="container mx-auto px-4 pb-20 border-b">
        <div class="popular">
            <h2 class="text-eyecandy tracking-wider text-2xl font-semibold"><span class="text-4xl">P</span>opular</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 ">
                @foreach ($popular as $movie)
                        <x-card :movie="$movie" :genres="$genres"></x-card>
                @endforeach
            </div>
        </div>
    </div>


    {{-- <div class="slider" x-data="{start: true, end: false}">
        <div class="slider__content" x-ref="slider" x-on:scroll.debounce="$refs.slider.scrollLeft == 0 ? start = true : start = false; Math.abs(($refs.slider.scrollWidth - $refs.slider.offsetWidth) - $refs.slider.scrollLeft) < 5 ? end = true : end = false;">
            @foreach ($popular as $movie)
            <div class="slider-item">
                <x-card :movie="$movie" :genres="$genres"></x-card>
            </div>
            @endforeach
        </div>
        <div class="slider__nav">
          <button class="slider__nav__button" x-on:click="$refs.slider.scrollBy({left: $refs.slider.offsetWidth * -1, behavior: 'smooth'});" x-bind:class="start ? '' : 'slider__nav__button--active'">Previous</button>
          <button class="slider__nav__button" x-on:click="$refs.slider.scrollBy({left: $refs.slider.offsetWidth, behavior: 'smooth'});" x-bind:class="end ? '' : 'slider__nav__button--active'">Next</button>
        </div>
      </div> --}}

    


    {{-- Now Playing Movies --}}
    <div class="container mx-auto px-4 pt-6 pb-20"">
        <div class="popular">
            <h2 class="text-eyecandy tracking-wider text-2xl font-semibold"><span class="text-4xl">N</span>ow Playing</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 ">

                @foreach ($nowPlaying as $movie)
                    {{-- {{$popMovie['title']}}    --}}
                    <x-card :movie="$movie" :genres="$genres" class="hover:border-2 hover:border-sky-500"></x-card>
                @endforeach

            </div>
        </div>
    </div>
</x-layout>