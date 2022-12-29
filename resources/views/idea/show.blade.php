<x-app-layout>
    <div>
        <a
            href="/"
            class="flex items-center font-semibold hover:underline"
        >
            <svg
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-4 h-4"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.75 19.5L8.25 12l7.5-7.5"
                />
            </svg>
            <span class="ml-2">
                All ideas
            </span>
        </a>
    </div>

    <div class="flex mt-4 bg-white idea-container rounded-xl">
        <div class="flex flex-col flex-1 px-4 py-6 md:flex-row">
            <div class="flex-none mx-2 md:mx-0">
                <a href="#">
                    <img
                        src="{{ $idea->user->getAvatar() }}"
                        alt="avatar"
                        class="w-14 h-14 rounded-xl"
                    >
                </a>
            </div>
            <div class="w-full mx-2 mt-4 md:mx-4 md:mt-0">
                <h4 class="text-xl font-semibold">
                    <a
                        href="#"
                        class="hover:underline"
                    >
                        {{ $idea->title }}
                    </a>
                </h4>
                <div class="mt-3 text-gray-600">
                    {{ $idea->description }}
                </div>
                <div class="flex flex-col justify-between mt-6 md:flex-row md:items-center">
                    <div class="flex items-center -ml-2 space-x-2 text-xs font-semibold text-gray-400 md:ml-0">
                        <div class="hidden font-bold text-gray-900 md:block">{{ $idea->user->name }}</div>
                        <div class="hidden md:block">&bull;</div>
                        <div>{{ $idea->created_at->diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div>Category</div>
                        <div>&bull;</div>
                        <div class="text-gray-700">3 Comments</div>
                    </div>
                    <div
                        x-data="{ isOpen: false }"
                        class="flex items-center mt-4 space-x-2 md:mt-0"
                    >
                        <div class="px-4 py-2 text-xs font-bold leading-none text-center uppercase bg-gray-200 rounded-full w-28 h-7">
                            Open
                        </div>
                        <button
                            @click="isOpen = !isOpen"
                            class="relative px-3 py-2 transition duration-150 ease-in bg-gray-100 rounded-full hover:bg-gray-200 h-7"
                        >
                            <svg
                                fill="currentColor"
                                width="24"
                                height="6"
                            >
                                <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                      style="color: rgba(163, 163, 163, .5)"
                                >
                            </svg>
                            <ul
                                x-cloak
                                x-show.="isOpen"
                                x-transition.duration.200ms
                                @click.away="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class="absolute right-0 z-10 py-3 font-semibold text-left bg-white shadow-md w-44 rounded-xl md:ml-8 top-8 md:top-6 md:left-0"
                            >
                                <li>
                                    <a
                                        href="#"
                                        class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100"
                                    >
                                        Mark as Spam
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="#"
                                        class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100"
                                    >
                                        Delete
                                    </a>
                                </li>
                            </ul>
                        </button>
                    </div>
                    <div class="flex items-center mt-4 md:hidden md:mt-0">
                        <div class="h-10 px-4 py-2 pr-8 text-center bg-gray-100 rounded-xl">
                            <div class="text-sm font-bold leading-none">12</div>
                            <div class="text-xs font-semibold leading-none text-gray-400">Votes</div>
                        </div>
                        <button class="w-20 px-4 py-3 -m-5 text-xs font-bold uppercase transition duration-150 ease-in bg-gray-200 border border-gray-200 rounded-xl hover:bg-gray-300">
                            Vote
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> {{-- end idea container --}}

    <div class="flex items-center justify-between mt-5 buttons-container">
        <div class="flex flex-col items-center space-x-4 md:flex-row md:ml-6">
            <div
                x-data="{ isOpen: false }"
                class="relative"
            >
                <button
                    @click="isOpen = !isOpen"
                    type="button"
                    class="flex items-center justify-center w-32 px-6 py-3 text-sm font-semibold text-white transition duration-150 ease-in bg-blue-500 border border-blue-500 h-11 rounded-xl hover:border-blue-600 hover:bg-blue-600"
                >
                    Reply
                </button>
                <div
                    x-cloak
                    x-show="isOpen"
                    x-transition.duration.200ms
                    @click.away="isOpen = false"
                    @keydown.escape.window="isOpen = false"
                    class="absolute z-10 w-64 mt-3 text-sm font-semibold text-left bg-white shadow-lg md:w-96 rounded-xl"
                >
                    <form
                        action="#"
                        method="POST"
                        class="px-4 py-6 space-y-4"
                    >
                        <div>
                            <textarea
                                name="post_comment"
                                id="post_comment"
                                cols="30"
                                rows="4"
                                class="w-full px-4 py-2 text-sm placeholder-gray-900 bg-gray-100 border-none rounded-xl"
                                placeholder="Go ahead. Share your thoughts..."
                            ></textarea>
                        </div>

                        <div class="flex flex-col items-center md:space-x-3 md:flex-row">
                            <button
                                type="submit"
                                class="flex items-center justify-center w-full px-6 py-3 text-sm font-semibold text-white transition duration-150 ease-in bg-blue-500 border border-blue-500 md:w-1/2 h-11 rounded-xl hover:border-blue-600 hover:bg-blue-600"
                            >
                                Post Comment
                            </button>
                            <button
                                type="button"
                                class="flex items-center justify-center w-full px-6 py-3 mt-4 text-xs font-semibold transition duration-150 ease-in bg-gray-200 border border-gray-200 md:w-1/3 md:mt-0 h-11 rounded-xl hover:border-gray-300 hover:bg-gray-300"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    width="100px"
                                    height="100px"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-4 text-gray-600 transform -rotate-45"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13"
                                    />
                                </svg>
                                <span
                                    class="ml-2"
                                >
                                    Attach
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div
                x-data="{ isOpen: false }"
                class="relative"
            >
                <button
                    @click="isOpen = !isOpen"
                    type="button"
                    class="flex items-center justify-center px-6 py-3 mt-4 text-xs font-semibold transition duration-150 ease-in bg-gray-200 border border-gray-200 md:mt-0 w-36 h-11 rounded-xl hover:border-gray-300 hover:bg-gray-300"
                >
                    <span class="ml-2">
                        Set Status
                    </span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="w-4 h-4 ml-2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19.5 8.25l-7.5 7.5-7.5-7.5"
                        />
                    </svg>
                </button>
                <div
                    x-cloak
                    x-show="isOpen"
                    x-transition.duration.200ms
                    @click.away="isOpen = false"
                    @keydown.escape.window="isOpen = false"
                    class="absolute z-20 mt-3 text-sm font-semibold text-left bg-white shadow-lg w-72 md:w-80 rounded-xl"
                >
                    <form action="#" method="POST" class="px-4 py-6 space-y-4">
                        <div class="space-y-2">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="text-gray-500 bg-gray-200 border-none" name="radio-direct" value="1">
                                    <span class="ml-2">Open</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="text-purple-500 bg-gray-200 border-none" name="radio-direct" value="1">
                                    <span class="ml-2">Considering</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="text-yellow-500 bg-gray-200 border-none" name="radio-direct" value="1">
                                    <span class="ml-2">In Progress</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="radio-direct" class="text-green-500 bg-gray-200 border-none" value="2">
                                    <span class="ml-2">Implemented</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="radio-direct" class="text-red-500 bg-gray-200 border-none" value="3">
                                    <span class="ml-2">Closed</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <textarea name="update_comment" id="update_comment" cols="30" rows="3" class="w-full px-4 py-2 text-sm placeholder-gray-900 bg-gray-100 border-none rounded-xl" placeholder="Add an update comment (optional)"></textarea>
                        </div>

                        <div class="flex flex-col items-center md:flex-row md:space-x-3">
                            <button type="button" class="flex items-center justify-center w-full px-6 py-3 text-xs font-semibold transition duration-150 ease-in bg-gray-200 border border-gray-200 md:w-1/2 h-11 rounded-xl hover:border-gray-300 hover:bg-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="100px" height="100px" stroke-width="1.5" stroke="currentColor" class="w-4 text-gray-600 transform -rotate-45">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>
                                <span class="ml-2">Attach</span>
                            </button>
                            <button type="submit"
                                    class="flex items-center justify-center w-full px-6 py-3 mt-4 text-sm font-semibold text-white transition duration-150 ease-in bg-blue-500 border border-blue-500 md:w-1/2 md:mt-0 h-11 rounded-xl hover:border-blue-600 hover:bg-blue-600">
                                Update
                            </button>
                        </div>
                        <div>
                            <label class="inline-flex items-center font-bold">
                                <input type="checkbox" name="notify_voters" class="bg-gray-200 border-none rounded">
                                <span class="ml-2">Notify all voters</span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="items-center hidden space-x-3 md:flex">
            <div class="px-3 py-2 font-semibold text-center bg-white rounded-xl">
                <div class="text-xl leading-snug">12</div>
                <div class="text-xs text-gray-400 leagind-none">Votes</div>
            </div>
            <button type="button" class="w-32 px-6 py-3 text-xs font-semibold uppercase transition duration-150 ease-in bg-gray-200 border border-gray-200 h-11 rounded-xl hover:border-gray-300 hover:bg-gray-300">
                <span>Vote</span>
            </button>
        </div>
    </div> {{-- end buttons container --}}

    <div class="relative pt-4 my-8 mt-1 space-y-6 md:ml-24 comments-container">
        <div class="relative flex mt-4 bg-white comment-container rounded-xl">
            <div class="flex flex-1 px-4 py-6 space-x-4">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=6" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full">
                    <div class="text-gray-600">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ea tenetur dolorem perspiciatis. Quia quae quidem voluptatibus magnam aut cupiditate sed cumque iusto provident. Nulla voluptas eveniet quod soluta commodi.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                            <div class="font-bold text-gray-900">Username</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div
                            x-data="{ isOpen: false }"
                            class="flex items-center space-x-2">
                            <button
                                @click="isOpen = !isOpen"
                                class="relative px-3 py-2 transition duration-150 ease-in bg-gray-100 rounded-full hover:bg-gray-200 h-7">
                                <svg fill="currentColor" width="24" height="6">
                                    <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)">
                                </svg>
                                <ul
                                    x-cloak
                                    x-show="isOpen"
                                    x-transition.duration.200ms
                                    @click.away="isOpen = false"
                                    @keydown.escape.window="isOpen = false"
                                    class="absolute right-0 z-10 py-3 font-semibold text-left bg-white shadow-md md:ml-8 w-44 rounded-xl top-8 md:top-6 md:left-0"
                                >
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as Spam</a></li>
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Delete</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- end comment container --}}

        <div class="relative flex mt-4 bg-white border border-blue-500 is-admin comment-container rounded-xl">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                    <div class="mt-1 text-xs font-bold text-center text-blue-600 uppercase">Admin</div>
                </div>
                <div class="w-full mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Admin title</a>
                    </h4>
                    <div class="mt-3 text-gray-600">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ea tenetur dolorem perspiciatis. Quia quae quidem voluptatibus magnam aut cupiditate sed cumque iusto provident. Nulla voluptas eveniet quod soluta commodi.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                            <div class="font-bold text-blue-600">Username</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div
                            x-data="{ isOpen: false }"
                            class="flex items-center space-x-2">
                            <button
                                @click="isOpen = !isOpen"
                                class="relative px-3 py-2 transition duration-150 ease-in bg-gray-100 rounded-full hover:bg-gray-200 h-7">
                                <svg fill="currentColor" width="24" height="6">
                                    <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)">
                                </svg>
                                <ul
                                    x-cloak
                                    x-show.="isOpen"
                                    x-transition.duration.200ms
                                    @click.away="isOpen = false"
                                    @keydown.escape.window="isOpen = false"
                                    class="absolute z-10 py-3 ml-8 font-semibold text-left bg-white shadow-md w-44 rounded-xl"
                                >
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as Spam</a></li>
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Delete</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- end comment container --}}

        <div class="relative flex mt-4 bg-white comment-container rounded-xl">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full mx-4">
                    <div class="mt-3 text-gray-600">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ea tenetur dolorem perspiciatis. Quia quae quidem voluptatibus magnam aut cupiditate sed cumque iusto provident. Nulla voluptas eveniet quod soluta commodi.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                            <div class="font-bold text-gray-900">Username</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div
                            x-data="{ isOpen: false }"
                            class="flex items-center space-x-2">
                            <button
                                @click="isOpen = !isOpen"
                                class="relative px-3 py-2 transition duration-150 ease-in bg-gray-100 rounded-full hover:bg-gray-200 h-7">
                                <svg fill="currentColor" width="24" height="6">
                                    <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)">
                                </svg>
                                <ul
                                    x-cloak
                                    x-transition.duration.200ms
                                    x-show="isOpen"
                                    @click.away="isOpen = false"
                                    @keydown.escape.window="isOpen = false"
                                    class="absolute z-10 py-3 ml-8 font-semibold text-left bg-white shadow-md w-44 rounded-xl">
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as Spam</a></li>
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Delete</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- end comment container --}}
    </div>{{-- end comments container --}}
</x-app-layout>
