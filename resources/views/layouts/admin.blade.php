<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/panel/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('plugins/dropify/css/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-icons/font/bootstrap-icons.css') }}">
    <style>
        .dropify-render {
            margin: auto;
        }

        .bg-cover {
            width: 100px;
            height: 60px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 6px
        }
    </style>
    @stack('style')
</head>

<body class="font-sans text-gray-900 bg-slate-100 antialiased">

    {{-- //* Navbar --}}
    @include('layouts.includes.navbar')

    {{-- //* Sidebar --}}
    @include('layouts.includes.sidebar')

    <div class="p-4 sm:ml-64">
        @include('layouts.includes.breadcrumb')

        <div class="p-4 border-2 border-white bg-white shadow rounded-lg dark:border-gray-700 mt-2 pb-12">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('plugins/sweetalert/sweetalert2@11.js') }}"></script>

    <script>
        // var DateTime = luxon.DateTime;

        function deleteSubmitForm(id) {
            Swal.fire({
                title: "¿Finalizar eliminación?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                denyButtonText: `Cancelar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Eliminado!', '', 'success')
                    document.querySelector('.delete-form-' + id).submit();
                }
            });
        }
    </script>

    <script src="{{ asset('plugins/jquery/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('plugins/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('js/panel/app.js') }}"></script>
    @vite(['resources/js/panel/trumbowygInit.js'])
    @stack('script')
</body>

</html>
