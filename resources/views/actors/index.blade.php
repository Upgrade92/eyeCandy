<x-layout>
    @include('partials._hero')

    {{--Popular Actors --}}
    <div class="container mx-auto px-6 pb-20 border-b">
        
        <div class="popular-actors">

            <h2 class="text-eyecandy tracking-wider text-2xl font-semibold "><span class="text-4xl">P</span>opular  <span class="text-4xl">A</span>ctors</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 ">
                @foreach($popularActors as $actor)
                <div class="actor mt-6 text-center bg-stone-600 pb-3 scale-90 rounded-xl hover:scale-100 ease-in-out hover:border-eyecandy hover:border-2 duration-300">
                    <a href="/actors/{{$actor['id']}}">
                        <img
                            class="w-96 rounded-xl mx-auto "
                            src="{{$actor['profile_path']}}"
                            alt=""
                        />
                    </a>
                    <div class="mt-2 px-3">
                        <a href="/actors/{{$actor['id']}}" class="text-2xl text-semibold"><span class="text-eyecandy">{{$actor['name']}}</span></a>
                        <div class="text-lg truncate">{{$actor['known_for']}}</div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>

        <div class="page-load-status text-center text-2xl text-eyecandy font-semibold py-4 mt-4">
            <p class="infinite-scroll-request">Loading...</p>
            <p class="infinite-scroll-last">End of content</p>
            <p class="infinite-scroll-error">No more pages to load</p>
        </div>

    </div>

@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        var elem = document.querySelector('.grid');
        var infScroll = new InfiniteScroll( elem, { 

        // options
        path: '/actors/page/@{{#}}',
        append: '.actor',
        status: '.page-load-status'
        // history: false,
    });
    </script>
@endsection

</x-layout>