<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Uso de Font Awesome para los icons -->
    <script src="https://kit.fontawesome.com/0138e4a498.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Integrando el SweetAlert2 via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Styles -->
    @livewireStyles

    <!-- Stack para agregar código css-->
    @stack('css')

</head>
<body class="font-sans antialiased sm:overflow-auto"
      :class="{ 'overflow-hidden': open}"
      x-data="{open:false}">


@include('layouts.includes.admin.nav')
@include('layouts.includes.admin.aside')

<div x-cloak x-show="open"
     x-on:click="open = false"
     class="bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-30 sm:hidden"></div>

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">


        {{ $slot }}
    </div>
</div>


@stack('modals')

@livewireScripts

@if(session('swal'))
    <script>
        Swal.fire(@json(session('swal')));
    </script>
@endif

<!-- Stack para agregar código javascript-->
@stack('js')

</body>
</html>
