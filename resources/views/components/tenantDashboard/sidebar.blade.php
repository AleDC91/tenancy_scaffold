<nav class="fixed top-0 z-50 w-full bg-purple-400 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="https://flowbite.com" class="flex ms-2 md:me-24">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" />
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Flowbite</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div class="flex items-center cursor-pointer" aria-expanded="false"
                        data-dropdown-toggle="dropdown-user">
                        <button type="button"
                            class=" text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-purple-600 dark:focus:ring-gray-600">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src={{ Auth::user()->profile_image }} alt="user photo">
                        </button>
                        <p class="mx-2">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">
                                Neil Sims
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                neil.sims@flowbite.com
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">Dashboard</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">Settings</a>
                            </li>
                            <li>
                                <a href="/profile"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">Profile</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">
                                    @csrf
                                    <button type="submit">
                                        Sign out
                                    </button>
                                </form>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</nav>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">

            <x-my-nav-link :href="route('tenant.dashboard')" :active="request()->routeIs('tenant.dashboard')" color="green">
                <x-slot name="icon">

                    <svg class="w-5 h-5"
                        aria-hidden="true" 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                </x-slot>
                Dashboard
            </x-my-nav-link>

            @role('admin')
                <x-my-nav-link :href="route('tenant.admin')" :active="request()->routeIs('tenant.admin')" color="green">
                    <x-slot name="icon" >
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                        aria-hidden="true" fill="currentColor"
                        > <path d="M512 176C512 273.2 433.2 352 336 352c-11.2 0-22.2-1.1-32.8-3.1l-24 27A24 24 0 0 1 261.2 384H224v40c0 13.3-10.7 24-24 24h-40v40c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24v-78.1c0-6.4 2.5-12.5 7-17l161.8-161.8C163.1 213.8 160 195.3 160 176 160 78.8 238.8 0 336 0 433.5 0 512 78.5 512 176zM336 128c0 26.5 21.5 48 48 48s48-21.5 48-48-21.5-48-48-48-48 21.5-48 48z"/>
                        </svg>
                    </x-slot>
                    Admin
                </x-my-nav-link>
            @endrole

            <x-my-nav-link :href="route('deadlines.index')" :active="request()->routeIs('deadlines.index') || request()->routeIs('deadlines.create')" color="green">
                <x-slot name="icon">

                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" 
                    viewBox="0 0 384 512"
                    aria-hidden="true" fill="currentColor">
                    <path d="M360 0H24C10.7 0 0 10.7 0 24v16c0 13.3 10.7 24 24 24 0 91 51 167.7 120.8 192C75 280.3 24 357 24 448c-13.3 0-24 10.7-24 24v16c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24v-16c0-13.3-10.7-24-24-24 0-91-51-167.7-120.8-192C309 231.7 360 155 360 64c13.3 0 24-10.7 24-24V24c0-13.3-10.7-24-24-24zm-75.1 384H99.1c17.1-46.8 52.1-80 92.9-80 40.8 0 75.9 33.2 92.9 80zm0-256H99.1C92 108.5 88 86.7 88 64h208c0 22.8-4 44.6-11.1 64z"/></svg>
                </x-slot>
                Deadlines
            </x-my-nav-link>
            <x-my-nav-link :href="route('inbox.index')" :active="request()->routeIs('inbox.index')" color="green">
                <x-slot name="icon">

                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" 
                    viewBox="0 0 512 512"
                    aria-hidden="true" fill="currentColor">
                    <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                </x-slot>
                Inbox
            </x-my-nav-link>

            {{-- <x-my-nav-link :href="route('calendar.index')" :active="request()->routeIs('deadlines.index')" color="green">
                <x-slot name="icon">

                    <svg class="w-5 h-5"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                </x-slot>
                Calendar
            </x-my-nav-link> --}}
            {{-- <x-my-nav-link :href="route('deadlines.index')" :active="request()->routeIs('deadlines.index')" color="green">
                <x-slot name="icon">

                    <svg class="w-5 h-5"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                </x-slot>
                altro
            </x-my-nav-link> --}}
        </ul>
    </div>
</aside>

<div class="p-4 sm:ml-64">
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
</div>
@push('app_scripts')
    @vite(['resources/js/appNavDropdown'])    
@endpush