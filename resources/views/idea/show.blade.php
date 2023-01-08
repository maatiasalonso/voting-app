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

    <livewire:idea-show
        :idea="$idea"
        :votesCount="$votesCount"
    />

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
