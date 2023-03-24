<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
        integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

    <!-- Trix Editor -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <!--Replace with your tailwind.css once created-->
    @vite(['resources/css/app.css'])
    @yield('styles')

</head>

<body class="mt-12 bg-gray-800 font-sans leading-normal tracking-normal">

    @include('admin.layouts.header')

    <main>

        <div class="flex flex-col md:flex-row">
            @include('admin.layouts.sidebar')
            <section class="flex-1 overflow-hidden">
                <div class="main-content mt-12 h-full bg-gray-100 pb-24 md:mt-2 md:pb-5" id="main">
                    <div class="w-full bg-gray-800 pt-3">
                        <div
                            class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 text-2xl text-white shadow">
                            <h1 class="pl-2 font-bold">
                                @if (Request::is('admin'))
                                    Dashboard
                                @elseif (Request::is('admin/products'))
                                    Products
                                @elseif (Request::is('admin/categories'))
                                    Categories
                                @else
                                @endif
                            </h1>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </section>
        </div>
    </main>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    @yield('scripts')

    <script src="/js/admin.js"></script>

    @vite('resources/js/app.js')
</body>

</html>
