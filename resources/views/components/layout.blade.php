<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <title>EyeCandy - candy for your eyes</title>

        <link rel="icon" type="image/png" href="images/eye-candy-favicon.png" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <livewire:styles>
        
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.11.1/dist/cdn.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        w: {
                            '64': '16rem',
                            '80': '20rem',
                            '96': '24rem'
                        },
                        colors: {
                            eyecandy: '#2dd4bf',
                        },
                        fontSize: {
                            xs: '0.6rem',
                        },
                    },
                },
            };
        </script>
        

    </head>

    <body class="bg-stone-700 text-white">

        @include('partials._header')
        <x-flash-message></x-flash-message>
        <main>
            {{$slot}}
        </main>

        @include('partials._footer')
        <livewire:scripts>
    </body>

</html>