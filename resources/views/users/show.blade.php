<x-layout>
    @auth   
    
    <div class="p-10">

        <header>
            <div class="text-center text-eyecandy text-2xl font-semibold pb-6">
                My Profile
            </div>
        </header>

        <table class="w-full table-auto rounded-sm ">
            <tbody>

                <tr class="border-gray-300">

                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-center">

                        <div class="pb-2">
                            <img
                                class="w-40 mx-auto  rounded-full bg-stone-800 p-1"
                                src="{{asset(auth()->user()->profile_img)}}"
                                alt=""
                            />

                            <a href='show?action=cpic' class="text-sm text-teal-500 underline hover:text-eyecandy ease-in-out duration-300">Change Picture</a>
                        </div>

                        @if (@$_GET['action'] == "cpic")

                            <form action="/upload" method="POST" enctype="multipart/form-data" class="pt-4">
                                @csrf
                    
                                <div>

                                    <input 
                                        type="file" 
                                        name="image" 
                                        id="inputImage"
                                        accept="image/png, image/jpeg, image/jpg"
                                        class="pb-1">
                    
                                    @error('image')
                                        <br><span class="text-red-500">{{ $message }}</span>
                                    @enderror

                                </div>
                    
                                <div class="mb-3">

                                    <button type="submit" class="bg-stone-800 p-2 m-1 rounded-lg text-eyecandy hover:border hover:border-eyecandy cursor-pointer">
                                        Upload
                                    </button>

                                </div>
                    
                            </form>

                        @endif

                        
                        <p>
                        <span class="text-eyecandy">Username: </span>{{auth()->user()->name}} <br>
                        <span class="text-eyecandy">Email: </span>{{auth()->user()->email}} <br>
                        <span class="text-eyecandy">Member since: </span>{{\Carbon\Carbon::parse(auth()->user()->created_at)->format('M d Y')}} <br>
                        <span class="text-eyecandy">Comments:</span> {{auth()->user()->comments}}
                        </p>
                    </td>
                </tr>

                <tr>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-center">

                        <span class="text-eyecandy">My List:</span>
                        <br>
                        (Coming soon)
                    </td>
                    
                </tr>
                
            </tbody>
        </table>

    </div>
    @else
    <script>window.location = "/";</script>

    @endauth

</x-layout>