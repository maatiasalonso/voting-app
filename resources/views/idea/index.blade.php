<x-app-layout>
    <div class="flex flex-col space-y-4 md:space-y-0 md:space-x-6 md:flex-row filters">
        <div class="w-full md:w-1/3">
            <select name="category"
                    id="category"
                    class="w-full px-4 py-2 border-none rounded-xl"
            >
                <option value="Category One">Category One</option>
                <option value="Category Two">Category Two</option>
                <option value="Category Three">Category Three</option>
                <option value="Category Four">Category Four</option>
            </select>
        </div>
        <div class="w-full md:w-1/3">
            <select name="other_filters"
                    id="other_filters"
                    class="w-full px-4 py-2 border-none rounded-xl"
            >
                <option value="Filter One">Filter One</option>
                <option value="Filter Two">Filter Two</option>
                <option value="Filter Three">Filter Three</option>
                <option value="Filter Four">Filter Four</option>
            </select>
        </div>
        <div class="relative w-full md:w-2/3">
            <input type="search"
                    placeholder="Find an idea"
                    class="w-full px-4 py-2 pl-10 bg-white border-none rounded-xl placeholder:text-gray-900"
            >
            <div class="absolute top-0 flex items-center h-full ml-3">
                <svg class="w-4 text-gray-700"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke-width="1.5"
                     stroke="currentColor"
                     class="w-6 h-6"
                >
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                    />
                </svg>
            </div>
        </div>
    </div>

    <div class="my-6 space-y-6 ideas-container">
        @foreach ($ideas as $idea)
            <div
                x-data
                @click="
                    clicked = $event.target
                    target = clicked.tagName.toLowerCase()
                    ignores = ['button', 'a', 'svg', 'path']
                    if(! ignores.includes(target)){
                        clicked.closest('.idea-container').querySelector('.idea-link').click()
                    }
                "
                class="flex transition duration-150 ease-in bg-white cursor-pointer idea-container hover:shadow-sm rounded-xl"
            >
                <div class="hidden px-5 py-8 border-r border-gray-100 md:block">
                    <div class="text-center">
                        <div class="text-2xl font-semibold">12</div>
                        <div class="text-gray-500">Votes</div>
                    </div>

                    <div class="mt-8">
                        <button class="w-20 px-4 py-3 text-xs font-bold uppercase transition duration-150 ease-in bg-gray-200 border border-gray-200 hover:bg-gray-400 rounded-xl">
                            Vote
                        </button>
                    </div>
                </div>
                <div class="flex flex-col flex-1 px-2 py-6 md:flex-row ">
                    <div class="flex-none mx-4 md:mx-0">
                        <a href="#">
                            <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1"
                                alt="avatar"
                                class="w-14 h-14 rounded-xl"
                            >
                        </a>
                    </div>
                    <div class="flex flex-col justify-between w-full mx-4 mt-2 md:mt-0">

                        <h4 class="text-xl font-semibold">
                            <a
                                href="{{ route('idea.show',$idea) }}"
                                class="hover:underline idea-link"
                            >
                                {{ $idea->title}}
                            </a>
                        </h4>

                        <div class="mt-3 text-gray-600 line-clamp-3">
                            {{ $idea->description }}
                        </div>

                        <div class="flex flex-col mt-6 md:items-center md:justify-between md:flex-row">

                            <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                                <div>{{ $idea->created_at->diffForHumans() }}</div>
                                <div>&bull;</div>
                                <div>Category</div>
                                <div>&bull;</div>
                                <div class="text-gray-700">3 Comments</div>
                            </div>

                            <div x-data="{ isOpen: false }" class="flex items-center mt-4 space-x-2 md:mt-0">
                                <div class="px-4 py-2 text-xs font-bold leading-none text-center uppercase bg-gray-200 rounded-full w-28 h-7">
                                    Open
                                </div>
                                <button @click="isOpen = !isOpen" class="relative px-3 py-2 transition duration-150 ease-in bg-gray-100 rounded-full hover:bg-gray-200 h-7">
                                    <svg fill="currentColor"
                                        width="24"
                                        height="6"
                                    >
                                        <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                            style="color: rgba(163, 163, 163, .5)"
                                        >
                                    </svg>
                                    <ul
                                        x-cloak
                                        x-show="isOpen"
                                        x-transition.duration.200ms
                                        @click.away="isOpen = false"
                                        @keydown.escape.window="isOpen = false"
                                        class="absolute right-0 py-3 font-semibold text-left bg-white shadow-md md:ml-8 top-8 md:top-6 md:left-0 w-44 rounded-xl">
                                        <li>
                                            <a href="#"
                                                class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100"
                                            >
                                                Mark as Spam
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
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
                                    Voted
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div> {{-- end idea container --}}
        @endforeach

        <div class="my-8">
            {{ $ideas->links() }}
        </div>

        <div class="flex transition duration-150 ease-in bg-white cursor-pointer idea-container hover:shadow-sm rounded-xl">
            <div class="hidden px-5 py-8 border-r border-gray-100 md:block">
                <div class="text-center">
                    <div class="text-2xl font-semibold text-blue-400 hover:text-blue-500">50</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 px-4 py-3 text-xs font-bold text-white uppercase transition duration-150 ease-in bg-blue-400 border border-blue-400 hover:bg-blue-500 rounded-xl">
                        Voted
                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>

                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title</a>
                    </h4>
                    <div class="mt-3 text-gray-600 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ea tenetur dolorem perspiciatis. Quia quae quidem voluptatibus magnam aut cupiditate sed cumque iusto provident. Nulla voluptas eveniet quod soluta commodi.
                    </div>
                    <div class="flex flex-col items-center mt-6 md:justify-between md:flex-row">
                        <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category</div>
                            <div>&bull;</div>
                            <div class="text-gray-700">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="px-4 py-2 text-xs font-bold leading-none text-center text-white uppercase bg-yellow-500 rounded-full w-28 h-7">
                                In Progress
                            </div>
                            <button class="relative px-3 py-2 transition duration-150 ease-in bg-gray-100 rounded-full hover:bg-gray-200 h-7">
                                <svg fill="currentColor" width="24" height="6">
                                    <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)">
                                </svg>
                                <ul class="absolute hidden py-3 ml-8 font-semibold text-left bg-white shadow-md w-44 rounded-xl">
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as Spam</a></li>
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Delete</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- end idea container --}}

        <div class="flex transition duration-150 ease-in bg-white cursor-pointer idea-container hover:shadow-sm rounded-xl">
            <div class="hidden px-5 py-8 border-r border-gray-100 md:block">
                <div class="text-center">
                    <div class="text-2xl font-semibold">25</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 px-4 py-3 text-xs font-bold uppercase transition duration-150 ease-in bg-gray-200 border border-gray-200 hover:bg-gray-400 rounded-xl">
                        Vote
                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>

                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title</a>
                    </h4>
                    <div class="mt-3 text-gray-600 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ea tenetur dolorem perspiciatis. Quia quae quidem voluptatibus magnam aut cupiditate sed cumque iusto provident. Nulla voluptas eveniet quod soluta commodi.
                    </div>
                    <div class="flex flex-col items-center mt-6 md:justify-between md:flex-row">
                        <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category</div>
                            <div>&bull;</div>
                            <div class="text-gray-700">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="px-4 py-2 text-xs font-bold leading-none text-center text-white uppercase bg-red-500 rounded-full w-28 h-7">
                                Closed
                            </div>
                            <button class="relative px-3 py-2 transition duration-150 ease-in bg-gray-100 rounded-full hover:bg-gray-200 h-7">
                                <svg fill="currentColor" width="24" height="6">
                                    <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)">
                                </svg>
                                <ul class="absolute hidden py-3 ml-8 font-semibold text-left bg-white shadow-md w-44 rounded-xl">
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as Spam</a></li>
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Delete</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- end idea container --}}

        <div class="flex transition duration-150 ease-in bg-white cursor-pointer idea-container hover:shadow-sm rounded-xl">
            <div class="hidden px-5 py-8 border-r border-gray-100 md:block">
                <div class="text-center">
                    <div class="text-2xl font-semibold">3</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 px-4 py-3 text-xs font-bold uppercase transition duration-150 ease-in bg-gray-200 border border-gray-200 hover:bg-gray-400 rounded-xl">
                        Vote
                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=5" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>

                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title</a>
                    </h4>
                    <div class="mt-3 text-gray-600 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ea tenetur dolorem perspiciatis. Quia quae quidem voluptatibus magnam aut cupiditate sed cumque iusto provident. Nulla voluptas eveniet quod soluta commodi.
                    </div>
                    <div class="flex flex-col items-center mt-6 md:justify-between md:flex-row">
                        <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category</div>
                            <div>&bull;</div>
                            <div class="text-gray-700">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="px-4 py-2 text-xs font-bold leading-none text-center text-white uppercase bg-green-500 rounded-full w-28 h-7">
                                Implemented
                            </div>
                            <button class="relative px-3 py-2 transition duration-150 ease-in bg-gray-100 rounded-full hover:bg-gray-200 h-7">
                                <svg fill="currentColor" width="24" height="6">
                                    <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)">
                                </svg>
                                <ul class="absolute hidden py-3 ml-8 font-semibold text-left bg-white shadow-md w-44 rounded-xl">
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as Spam</a></li>
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Delete</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- end idea container --}}

        <div class="flex transition duration-150 ease-in bg-white cursor-pointer idea-container hover:shadow-sm rounded-xl">
            <div class="hidden px-5 py-8 border-r border-gray-100 md:block">
                <div class="text-center">
                    <div class="text-2xl font-semibold">10</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 px-4 py-3 text-xs font-bold uppercase transition duration-150 ease-in bg-gray-200 border border-gray-200 hover:bg-gray-400 rounded-xl">
                        Vote
                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=6" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>

                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title</a>
                    </h4>
                    <div class="mt-3 text-gray-600 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ea tenetur dolorem perspiciatis. Quia quae quidem voluptatibus magnam aut cupiditate sed cumque iusto provident. Nulla voluptas eveniet quod soluta commodi.
                    </div>
                    <div class="flex flex-col items-center mt-6 md:justify-between md:flex-row">
                        <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category</div>
                            <div>&bull;</div>
                            <div class="text-gray-700">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="px-4 py-2 text-xs font-bold leading-none text-center text-white uppercase bg-purple-500 rounded-full w-28 h-7">
                                Considering
                            </div>
                            <button class="relative px-3 py-2 transition duration-150 ease-in bg-gray-100 rounded-full hover:bg-gray-200 h-7">
                                <svg fill="currentColor" width="24" height="6">
                                    <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)">
                                </svg>
                                <ul class="absolute hidden py-3 ml-8 font-semibold text-left bg-white shadow-md w-44 rounded-xl">
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as Spam</a></li>
                                    <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Delete</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- end idea container --}}
    </div> {{-- end ideas container --}}
</x-app-layout>
