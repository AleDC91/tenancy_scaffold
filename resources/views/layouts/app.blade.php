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
    {{-- <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" /> --}}
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
@include('layouts.navigation')
<!-- Page Content -->
<main>
    {{ $slot }}
</main>

<footer class="bg-white">
    <div class="container mx-auto px-8">
        <div class="w-full flex flex-col md:flex-row py-6">
            <div class="flex-1 mb-6 text-black">
                <a class="text-pink-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
                    <!--Icon from: http://www.potlabicons.com/ -->
                    <svg class="h-8 fill-current inline" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512.005 512.005">
                        <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502"
                            transform="matrix(1,0,0,1,0,0)" />
                        <path class="plane-take-off"
                            d=" M 510.7 189.151 C 505.271 168.95 484.565 156.956 464.365 162.385 L 330.156 198.367 L 155.924 35.878 L 107.19 49.008 L 211.729 230.183 L 86.232 263.767 L 36.614 224.754 L 0 234.603 L 45.957 314.27 L 65.274 347.727 L 105.802 336.869 L 240.011 300.886 L 349.726 271.469 L 483.935 235.486 C 504.134 230.057 516.129 209.352 510.7 189.151 Z " />
                    </svg>
                    LANDING
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

@vite('resources/js/appHeader.js')
@vite('resources/js/appNavDropdown.js')

@stack('app_scripts')

</body>


</html>
