<x-layout>

    <div class="p-10">

        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                [Users] Profile
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                <tr class="border-gray-300">

                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">

                        {{-- <img
                            class="w-24 mr-6 mb-6"
                            src="{{$listing->logo ? asset('storage/'. $listing->logo) : asset('/images/no-image.png')}}"
                            alt=""
                        /> --}}

                    </td>

                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg hover:text-red-500 hover:scale-105 ease-in duration-200">

                        {{-- <a href="/listings/{{$listing->id}}" >
                            {{$listing->title}}
                        </a> --}}

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

</x-layout>