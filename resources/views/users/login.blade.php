<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="icon" type="image/png" href="images/eye-candy-favicon.png" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

        <title>EyeCandy - candy for your eyes</title>

        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        w: {
                            '80': '20rem',
                        },
                        colors: {
                            eyecandy: '#2dd4bf',
                        },
                    },
                },
            };
        </script>
</head>
<body class="bg-stone-700 text-white">

    <div class="mx-4 text-black mt-52">
        <div class="p-20 max-w-lg mx-auto mt-24 bg-stone-800 rounded-2xl">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1 text-eyecandy">
                    Login
                </h2>
                <p class="mb-4 text-white">Log into your account</p>
            </header>

            <form method="POST" action="/users/authenticate">
                @csrf
                
                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2 text-eyecandy">
                        Email
                    </label>
                    <input
                        type="email"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="email"
                        value="{{old('email')}}"
                    />

                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label
                        for="password"
                        class="inline-block text-lg mb-2 text-eyecandy" >
                            Password
                    </label>
                    <input
                        type="password"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="password"
                        value="{{old('password')}}"
                    />

                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-teal-600 rounded py-2 px-4 hover:bg-teal-400 text-black font-semibold hover:scale-110 ease-in-out duration-300">
                        Login
                    </button>
                </div>

                <div class="mt-8">
                    <p class="text-white">
                        Don't have an account?
                        <a href="/register" class="text-eyecandy hover:text-blue-500 ease-in duration-200">
                            <span class="ml-5 hover:scale-150 text-xl">
                                Register
                            </span>
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    @include('partials._footer')
</body>
</html>