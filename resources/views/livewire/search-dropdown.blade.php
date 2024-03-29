
<div class="relative mx-4" x-data="{isOpen: true}" @click.away="isOpen = false">

    <input 
        wire:model.debounce.500ms="search" 
        type="text" class="bg-stone-700 rounded-full w-56 px-4 pl-8 py-1  focus:shadow-outline" 
        placeholder="search..."
        @focus="isOpen = true"
        @keydown="isOpen = true"
        @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false"
    >

    <div class="absolute top-0">
        <i class="text-gray-500 mt-2 ml-2 fa-solid fa-magnifying-glass"></i>
    </div>
    
    @if (strlen($search)>2)

        <div class="absolute bg-stone-700 rounded text-white w-52 z-10 ml-2" 
             x-show.transition.opacity="isOpen"
             >
            
            @if (count($searchResults) > 0)
                
                <ul>
                    
                    @foreach ( $searchResults as $result )

                        @if ($loop->index < 6)
                    
                            <li class="border-b text-sm border-gray-500">

                                @if($result['media_type'] == 'movie')
                                    <a href="/movies/{{$result['id']}}" class="block hover:bg-gray-700 px-3 py-3">
                                @elseif($result['media_type'] == 'tv')
                                    <a href="/series/{{$result['id']}}" class="block hover:bg-gray-700 px-3 py-3">
                                @else
                                    <a href="/actors/{{$result['id']}}" class="block hover:bg-gray-700 px-3 py-3">
                                @endif

                                        <div class="flex">

                                            @if (isset($result['poster_path']))
                                                <img
                                                    class="w-12 rounded-xl"
                                                    src="https://image.tmdb.org/t/p/w92/{{$result['poster_path']}}"
                                                    alt=""
                                                />
                                            @elseif (isset($result['profile_path']))
                                                <img
                                                    class="w-12 rounded-xl"
                                                    src="https://image.tmdb.org/t/p/w92/{{$result['profile_path']}}"
                                                    alt=""
                                                />
                                            @else  
                                                <img
                                                    class="w-12 rounded-xl"
                                                    src="{{asset('/images/no-cover.png')}}"
                                                    alt=""
                                                />
                                            @endif
                                        
                                            <div class="ml-4 my-auto font-semibold">

                                                @if(isset($result['title']))

                                                    {{$result['title']}}
                                                    <br>
                                                    <span class="text-sm text-gray-400">movie</span>

                                                @else 
                                                
                                                    {{$result['name']}}
                                                    <br>

                                                    @if ($result['media_type'] == 'tv')
                                                        <span class="text-sm text-gray-400">series</span>
                                                    @else
                                                    <span class="text-sm text-gray-400">actor</span>
                                                    @endif

                                                @endif
                                            
                                            </div>
                                    
                                        </div> 

                                    </a>

                            </li>

                        @endif  

                    @endforeach
                    
                </ul>

                @else

                    <div class="px-3 py-3 text-sm">
                        No results for "{{$search}}"
                    </div>

            @endif 

        </div>

    @endif
</div>

