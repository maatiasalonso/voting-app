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
    </head>
    <body class="font-sans bg-neutral-100 text-gray-900 text-sm">
        <header class="flex items-center justify-between px-8 py-4">
            <a href="#">
                <button class="rounded-full py-6 px-4 bg-gray-300">
                    LOGO
                </button>
            </a>
            <div class="flex items-center">
                @if (Route::has('login'))
                    <div class="px-6 py-4">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <a href="#">
                    <img src="https://www.gravatar.com/avatar/?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
                </a>
            </div>
        </header>

        <main class="container mx-auto max-w-screen-lg flex flex-row space-x-10">
            <div class="basis-1/4">
                Idea Form
            </div>
            <div class="basis-3/4">
                <nav class="flex items-center justify-between text-xs">
                    <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-1">
                        <li><a href="#" class="border-b-4 border-blue-500 pb-1">All Ideas (87)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-1 hover:border-blue-500">Considering (6)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-1 hover:border-blue-500">In Progress (1)</a></li>
                    </ul>
                    <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-1">
                        <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-1 hover:border-blue-500">Implemented (10)</a></li>
                        <li><a href="#" class="text-gray-400 transition duration-150 ease-in border-b-4 pb-1 hover:border-blue-500">Closed (55)</a></li>
                    </ul>
                </nav>
                <div class="mt-8">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </body>
</html>
