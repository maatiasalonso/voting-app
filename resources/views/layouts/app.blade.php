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
    <body class="font-sans text-sm text-gray-900 bg-neutral-100">
        <header class="flex items-center justify-between px-8 py-4">
            <a href="#">
                <button class="px-4 py-6 bg-gray-300 rounded-full">
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

        <main class="container flex flex-row max-w-screen-lg mx-auto space-x-10">
            <div class="basis-1/4">
                <div class="sticky my-16 bg-white border-2 shadow-md rounded-xl top-8">
                    <div class="px-6 py-2 pt-6 text-center">
                        <h3 class="text-base font-semibold">Add an idea</h3>
                        <p class="mt-4 text-xs">Let us know everything!</p>
                    </div>

                    <form action="#" method="POST" class="px-4 py-6 space-y-4">
                        <div>
                            <input type="text" class="w-full px-4 py-2 text-sm placeholder-gray-900 bg-gray-100 border-none rounded-xl" placeholder="Your idea">
                        </div>
                        <div>
                            <select name="category_add" id="category_add" class="w-full px-4 py-2 text-sm bg-gray-100 border-none rounded-xl">
                                <option value="Category One">Category One</option>
                                <option value="Category Two">Category Two</option>
                                <option value="Category Three">Category Three</option>
                                <option value="Category Four">Category Four</option>
                            </select>
                        </div>
                        <div>
                            <textarea name="idea" id="idea" cols="30" rows="4" class="w-full px-4 py-2 text-sm placeholder-gray-900 bg-gray-100 border-none rounded-xl" placeholder="Describe your idea"></textarea>
                        </div>
                        <div class="flex items-center justify-between space-x-3">
                            <button type="button" class="flex items-center justify-center w-1/2 px-6 py-3 text-xs font-semibold transition duration-150 ease-in bg-gray-200 border border-gray-200 h-11 rounded-xl hover:border-gray-300 hover:bg-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="100px" height="100px" stroke-width="1.5" stroke="currentColor" class="w-6 text-gray-600 transform -rotate-45">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>
                                <span class="ml-2">Attach</span>
                            </button>

                            <button type="submit" class="flex items-center justify-center w-1/2 px-6 py-3 text-xs font-semibold text-white transition duration-150 ease-in bg-blue-500 border border-blue-500 h-11 rounded-xl hover:border-blue-600 hover:bg-blue-600">
                                <span>Submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="basis-3/4">
                <nav class="flex items-center justify-between text-xs">
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
    </body>
</html>
