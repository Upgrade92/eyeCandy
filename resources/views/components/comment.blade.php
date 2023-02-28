<div class='bg-stone-800 border border-stone-600 p-6 my-4 rounded-2xl'>

    <h4 class="text-eyecandy py-2">{{$comment->name}}</h4>

    <p class="text-sm pb-6 text-gray-400">
        Replied on: {{\Carbon\Carbon::parse($comment->created_at)->format('M d Y')}} at {{\Carbon\Carbon::parse($comment->created_at)->format('H:i')}}
    </p>
    
    <p class="px-5">
        {{$comment->content}}
    </p>
    
</div>