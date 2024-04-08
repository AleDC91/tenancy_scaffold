<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', config('tenancy.central_domains')[0]) }}</title>
    <meta name="description" content={{ config('tenancy.central_domains')[0] . 'a description' }} />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<!-- Page Content -->
<main class="main-with-navbar">
   
    {{ $slot }}
</main>

<!-- jQuery if you need it
              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
              -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@stack('app_scripts')
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

</body>


</html>
