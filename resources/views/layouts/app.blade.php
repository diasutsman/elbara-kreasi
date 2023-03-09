<!DOCTYPE html>
<html lang="en" class="font-sans">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <link href="{{ asset('favicon-dark.ico') }}" id="darkUrl" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    @if (Request::is('products/*'))
        <link rel="stylesheet" href="{{ asset('js/owlcarousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('js/owlcarousel/owl.theme.default.min.css') }}">
    @endif

    {{-- Fonts custom --}}
    <link rel="stylesheet" href="/css/fonts.css">

    <title>Elbara Kreasi Indonesia</title>
</head>

<body class="dark:bg-dark-mode">
    @include('partials.top-bar')
    @include('partials.header')
    @include('partials.nav')

    @if (!Request::is('products/*'))
        <a class="bg-[#25D366] p-4 fixed rounded-full right-4 bottom-4 md:bottom-10 xl:bottom-1/2 xl:translate-y-1/2 z-10 text-white"
            href="#">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-whatsapp h-5 w-5"
                viewBox="0 0 16 16">
                <path
                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
            </svg>
        </a>
    @endif

    @yield('content')

    @include('partials.footer')

    @if (Request::is('products/*'))
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
        <script src="{{ asset('/js/owlcarousel/owl.carousel.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $(".owl-carousel").owlCarousel({
                    margin: 35,
                    items: 1,
                    nav: true,
                    responsive: {
                        640: {
                            items: 2,
                        },
                        768: {
                            items: 3,
                        },
                        1024: {
                            items: 4,
                        }
                    }
                });
            });
        </script>
    @endif

    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite('resources/js/app.js')
</body>

</html>
