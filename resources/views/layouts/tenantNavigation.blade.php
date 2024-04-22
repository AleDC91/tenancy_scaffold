<nav id="header" class="fixed w-full z-30 top-0 text-white gradient-secondary ">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
            <a class="w-44"
            href="#">
            <img id="logo-header" class="w-full h-full" src="{{asset('images/duetect_logo_white.png')}}" alt="">
        </a>
        </div>
        <div class="block lg:hidden pr-4">
            <button id="nav-toggle"
                class="flex items-center p-1 text-blue-900 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20"
            id="nav-content">

            @if (Route::has('login'))
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    @auth



                        <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation"
                            class="text-black font-medium rounded-lg text-sm text-center inline-flex items-center"
                            type="button">
                            <img src={{asset(Auth::user()->profile_image)}}
                            alt="user_avatar" class="rounded-full w-14 h-14 me-2">
                            <p>{{ Auth::user()->name }}</p>
                            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownInformation"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div>{{Auth::user()->name}}</div>
                                <div class="font-medium truncate">{{Auth::user()->email}}</div>
                            </div>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownInformationButton">
                                @if (Auth::user()->isAdmin())
                                <li>
                                    <a href="/admin"
                                        class="block px-4 py-2 text-black hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Admin</a>
                                </li>
                            @endif
                                <li>
                                    <a href="/dashboard"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                </li>
                                <li>
                                    <a href="/profile"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                                </li>


                            </ul>
                            <div class="py-2">
                                <form method="POST" action="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    @csrf
                                    <button type="submit">
                                        Sign out
                                    </button>
                                </form>

                            </div>
                        </div>
                    @else
                        <li>
                            <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4"
                                href="/login">Login</a>
                        </li>
                        <a role="button" href="/register" id="navAction"
                            class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                            Sign Up
                        </a>
                    @endauth
                </ul>
            @endif

        </div>
    </div>
    <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
</nav>
@vite('resources/js/appNavDropdown.js')