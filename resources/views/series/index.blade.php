<x-layout>
    @include('partials._hero')

    {{-- Popular Series --}}
    <div class="container mx-auto px-4 pb-20 border-b">
        <div class="popular">
            <h2 class="text-eyecandy tracking-wider text-2xl font-semibold"><span class="text-4xl">P</span>opular <span class="text-4xl">S</span>eries</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 ">
                @foreach ($popular as $tvshow)
                        <x-series-card :tvshow="$tvshow" class="hover:border-2 hover:border-eyecandy"></x-series-card>
                @endforeach
            </div>
        </div>
    </div>


    {{-- Now Playing Movies --}}
    <div class="container mx-auto px-4 pt-6 pb-20"">
        <div class="popular">
            <h2 class="text-eyecandy tracking-wider text-2xl font-semibold"><span class="text-4xl">T</span>op <span class="text-4xl">R</span>ated</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 ">

                @foreach ($topRated as $tvshow)
                    <x-series-card :tvshow="$tvshow" class="hover:border-2 hover:border-eyecandy"></x-series-card>
                @endforeach

            </div>
        </div>
    </div>
</x-layout>

