@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="z-50 fixed top-20 left-1/2 transform -translate-x-1/2 bg-stone-800/75 text-white px-12 py-4 my-4 rounded-xl border-2 border-eyecandy">
        <p class="text-2xl text-eyecandy">
            {{session('message')}}
        </p>
    </div>
@endif