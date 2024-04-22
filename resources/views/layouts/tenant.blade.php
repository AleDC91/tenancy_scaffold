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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"
        integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
@include('layouts.tenantNavigation')
<!-- Page Content -->
<main class="main-with-navbar">
    <div class="w-full flex justify-center">
        @if (session('success'))
            <x-success-alert>
                {{ session('success') }}
            </x-success-alert>
        @endif

        @if (session('error'))
            <x-error-alert>
                {{ session('error') }}
            </x-error-alert>
        @endif
    </div>
    {{ $slot }}
</main>

<footer class="bg-white">
    <div class="container mx-auto px-8">
        <div class="w-full flex flex-col md:flex-row py-6">
            <div class="flex-1 mb-6 pe-6 text-black h-11 w-44">
                <a class="" href="#">
                    <img id="logo-header" class="w-full h-full" src="{{ asset('images/duetect_logo.png') }}"
                        alt="">
                </a>
            </div>
            <div class="flex-1">
                <p class="uppercase text-gray-500 md:mb-6">Links</p>
                <ul class="list-reset mb-6">
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">FAQ</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#"
                            class="no-underline hover:underline text-gray-800 hover:text-pink-500">Help</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#"
                            class="no-underline hover:underline text-gray-800 hover:text-pink-500">Support</a>
                    </li>
                </ul>
            </div>
            <div class="flex-1">
                <p class="uppercase text-gray-500 md:mb-6">Legal</p>
                <ul class="list-reset mb-6">
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#"
                            class="no-underline hover:underline text-gray-800 hover:text-pink-500">Terms</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#"
                            class="no-underline hover:underline text-gray-800 hover:text-pink-500">Privacy</a>
                    </li>
                </ul>
            </div>
            <div class="flex-1">
                <p class="uppercase text-gray-500 md:mb-6">Social</p>
                <ul class="list-reset mb-6">
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#"
                            class="no-underline hover:underline text-gray-800 hover:text-pink-500">Facebook</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#"
                            class="no-underline hover:underline text-gray-800 hover:text-pink-500">Linkedin</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#"
                            class="no-underline hover:underline text-gray-800 hover:text-pink-500">Twitter</a>
                    </li>
                </ul>
            </div>
            <div class="flex-1">
                <p class="uppercase text-gray-500 md:mb-6">Company</p>
                <ul class="list-reset mb-6">
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#"
                            class="no-underline hover:underline text-gray-800 hover:text-pink-500">Official
                            Blog</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">About
                            Us</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a href="#"
                            class="no-underline hover:underline text-gray-800 hover:text-pink-500">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <a href="https://www.freepik.com/free-photos-vectors/background" class="text-gray-500">Background vector
        created by freepik - www.freepik.com</a>
</footer>
<!-- jQuery if you need it
              <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
              -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

@stack('app_scripts')

</body>


</html>
