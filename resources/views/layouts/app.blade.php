<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans text-sm text-gray-900 bg-neutral-100">
        <header class="flex flex-col items-center justify-between px-8 py-4 md:flex-row">
            <a href="#">
                <button class="px-4 py-6 bg-gray-300 rounded-full">
                    LOGO
                </button>
            </a>
            <div class="flex items-center mt-2 md:mt-0">
                @if (Route::has('login'))
                    <div class="px-6 py-4">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                    class="text-sm text-gray-700 underline dark:text-gray-500"
                                >
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline dark:text-gray-500">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline dark:text-gray-500">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <a href="#">
                    <img src="https://www.gravatar.com/avatar/?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
                </a>
            </div>
        </header>

        <main class="container flex flex-col max-w-screen-lg mx-auto md:space-x-10 md:flex-row">
            <div class="mx-auto md:mx-0 basis-1/4">
                <div class="my-16 bg-white border-2 shadow-md md:sticky rounded-xl md:top-8">
                    <div class="px-6 py-2 pt-6 text-center">
                        <h3 class="text-base font-semibold">Add an idea</h3>
                        <p class="mt-4 text-xs">
                            @auth
                                Let us know everything!
                            @else
                                Please login to create an idea.
                            @endauth
                        </p>
                    </div>
                    @auth
                        <livewire:create-idea>
                    @else
                        <div class="my-6 text-center">
                            <a
                                href="{{ route('login') }}"
                                class="justify-center inline-block w-1/2 px-6 py-3 text-xs font-semibold text-white transition duration-150 ease-in bg-blue-500 border border-blue-500 md:w-2/3 h-11 rounded-xl hover:border-blue-600 hover:bg-blue-600">
                                Login
                            </a>
                            <a
                                href="{{ route('register') }}"
                                class="justify-center inline-block w-1/2 px-6 py-3 mt-3 text-xs font-semibold text-white transition duration-150 ease-in bg-gray-400 border border-gray-400 md:w-2/3 h-11 rounded-xl hover:border-gray-500 hover:bg-gray-500">
                                Register
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="w-full px-4 md:basis-3/4 md:px-0">
                <nav class="items-center justify-between hidden text-xs md:flex">
                    <ul class="flex pb-1 space-x-10 font-semibold uppercase border-b-4">
                        <li><a href="#" class="pb-1 border-b-4 border-blue-500">All Ideas (87)</a></li>
                        <li><a href="#" class="pb-1 text-gray-400 transition duration-150 ease-in border-b-4 hover:border-blue-500">Considering (6)</a></li>
                        <li><a href="#" class="pb-1 text-gray-400 transition duration-150 ease-in border-b-4 hover:border-blue-500">In Progress (1)</a></li>
                    </ul>
                    <ul class="flex pb-1 space-x-10 font-semibold uppercase border-b-4">
                        <li><a href="#" class="pb-1 text-gray-400 transition duration-150 ease-in border-b-4 hover:border-blue-500">Implemented (10)</a></li>
                        <li><a href="#" class="pb-1 text-gray-400 transition duration-150 ease-in border-b-4 hover:border-blue-500">Closed (55)</a></li>
                    </ul>
                </nav>
                <div class="mt-8">
                    {{ $slot }}
                </div>
            </div>
        </main>
        @livewireScripts
    </body>
</html>
