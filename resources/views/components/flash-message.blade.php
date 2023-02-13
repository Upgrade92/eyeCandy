@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-20 left-1/2 transform -translate-x-1/2 bg-stone-800/75 text-white px-12 py-4 my-4 rounded-xl">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif