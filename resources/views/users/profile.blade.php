<x-layout>
    @auth
        
    
    <div class="p-10">

        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                {{auth()->user()->name}} <br>
                {{auth()->user()->email}} <br>
                {{auth()->user()}}
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                <tr class="border-gray-300">

                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-center">

                        <img
                            class="w-40 mx-auto mb-6 rounded-full"
                            src="{{asset(auth()->user()->profile_img)}}"
                            alt=""
                        />
                        <p>
                        <span class="text-eyecandy">Username: </span>{{auth()->user()->name}} <br>
                        <span class="text-eyecandy">Email: </span>{{auth()->user()->email}} <br>
                        <span class="text-eyecandy">Member since: </span>{{\Carbon\Carbon::parse(auth()->user()->created_at)->format('M d Y')}} <br>
                        <span class="text-eyecandy">Comments:</span> {{auth()->user()->comments}}
                        </p>
                    </td>

                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-center">

                        My List:
                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg ease-in duration-300 hover:scale-105">

                        {{-- <a
                            href="/listings/{{$listing->id}}/edit"
                            class="text-blue-400 px-6 py-2 rounded-xl ">
                            <i
                                class="fa-solid fa-pen-to-square">
                            </i>
                            Edit
                        </a> --}}

                    </td>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg ease-in duration-300 hover:scale-105">
                        {{-- <form  method="POST" action="/listings/{{$listing->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="hover:text-red-500 ease-in duration-300 hover:scale-105">
                                <i class="fa-solid fa-trash"></i>
                                Delete
                            </button>
                        </form> --}}
                    </td>
                </tr>
                
            </tbody>
        </table>

    </div>
    @else
    <script>window.location = "/";</script>

    @endauth


</x-layout>