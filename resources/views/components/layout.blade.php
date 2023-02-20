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
        
        {{-- not working --}}
        <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
        {{-- <script src="{{ url('/public/resources/js/app.js') }}"></script> --}}
        {{-- <script src="{{ asset('public/js/app.js') }}"></script> --}}
        @vite('resources/js/app.js')

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

    {{-- <style>

        :root {
        --scrollcolor: #fff;
        --scrollbackground: #141e27;
        }

        * {
        box-sizing: border-box;
        }

        html,
        body {
        padding: 0;
        margin: 0;
        }

        body {
        background: #180148;
        }

        .title {
        font-size: 2.5rem;
        font-family: system-ui;
        line-height: 1.1;
        font-weight: 300;
        color: #fff;
        margin: 4rem auto 1rem;
        width: 85%;
        max-width: 1280px;
        }

        .slider {
        width: 85%;
        max-width: 1280px;
        margin: 0 auto;
        }

        .slider__content {
        overflow-x: scroll;
        -ms-scroll-snap-type: x mandatory;
            scroll-snap-type: x mandatory;
        display: flex;
        gap: 1rem;
        padding-bottom: 1rem;
        scrollbar-color: var(--scrollcolor) var(--scrollbackground);
        }
        .slider__content::-webkit-scrollbar {
        height: 0.5rem;
        width: 0.5rem;
        border-radius: 1rem;
        background: var(--scrollbackground);
        }
        .slider__content::-webkit-scrollbar-thumb {
        border-radius: 1rem;
        background: var(--scrollcolor);
        }
        .slider__content::-webkit-scrollbar-track {
        border-radius: 1rem;
        background: var(--scrollbackground);
        }

        .slider__item {
        scroll-snap-align: start;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        min-width: 100%;
        width: 100%;
        border-radius: 0.25rem;
        overflow: hidden;
        position: relative;
        aspect-ratio: 1;
        }
        @media (min-width: 460px) {
        .slider__item {
            aspect-ratio: 2/3;
            min-width: calc((100% / 2) - 2rem);
        }
        }
        @media (min-width: 940px) {
        .slider__item {
            min-width: calc((100% / 3) - 4rem);
        }
        }

        .slider__image {
        display: block;
        width: 100%;
        height: 100%;
        -o-object-fit: cover;
            object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
        }

        .slider__info {
        position: relative;
        padding: 4rem 2rem 2rem;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.75), rgba(32, 50, 57, 0));
        }
        .slider__info h2 {
        color: #fff;
        font-family: system-ui;
        line-height: 1.1;
        font-weight: 300;
        font-size: 1.75rem;
        margin: 0;
        }

        .slider__nav {
        margin: 1rem 0 4rem;
        width: 100%;
        padding: 0;
        display: flex;
        justify-content: flex-start;
        gap: 1rem;
        align-content: center;
        align-items: center;
        pointer-events: none;
        }
        @media (min-width: 460px) {
        .slider__nav {
            justify-content: flex-end;
        }
        }

        .slider__nav__button {
        margin: 0;
        -webkit-appearance: none;
            -moz-appearance: none;
                appearance: none;
        border: 0;
        border-radius: 2rem;
        background: #fff;
        color: #203239;
        padding: 0.5rem 1rem;
        font-size: 0.75rem;
        line-height: 1;
        pointer-events: none;
        transition: 0.2s ease-out;
        opacity: 0.25;
        }
        .slider__nav__button--active {
        opacity: 1;
        pointer-events: auto;
        cursor: pointer;
        }

    </style> --}}



        <script>
            function scrollLock(status) {
            var body = document.querySelector("body");

            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            var scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

            window.onscroll = function () {};

            if (status === true) {
                // Check window scroll exists else use traditional method
                if (window.onscroll !== null) {
                    // if any scroll is attempted, set this to the previous value
                    window.onscroll = function () {
                        window.scrollTo(scrollLeft, scrollTop);
                    };
                }
            } 
            else {
                //body.classList.remove("fixed", "overflow-y-scroll");
                window.onscroll = function () {};
                }
            }

            function refreshSrc(){ 
                document.getElementById('iframe_video').src = document.getElementById('iframe_video').src;
            }

            function toTop(){
                window.location.href='#top';
            }
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