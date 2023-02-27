<x-layout>
    @include('partials._hero')

    {{--Popular Actors --}}
    <div class="container mx-auto px-16 pb-20 border-b">
        
        <div class="popular-actors">

            <h2 class="text-eyecandy tracking-wider text-2xl font-semibold "><span class="text-4xl">P</span>opular  <span class="text-4xl">A</span>ctors</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 ">
                
                @foreach($popularActors as $actor)
                    <x-actor-card :actor="$actor"></x-actor-card>
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