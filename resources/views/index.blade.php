<x-app-layout>
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select name="category" id="category" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Category One">Category One</option>
                <option value="Category Two">Category Two</option>
                <option value="Category Three">Category Three</option>
                <option value="Category Four">Category Four</option>
            </select>
        </div>
        <div class="w-1/3">
            <select name="other_filters" id="other_filters" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Category One">Category One</option>
                <option value="Category Two">Category Two</option>
                <option value="Category Three">Category Three</option>
                <option value="Category Four">Category Four</option>
            </select>
        </div>
        <div class="w-2/3 relative">
            <input type="search" placeholder="Find an idea" class="w-full rounded-xl bg-white border-none placeholder:text-gray-900 px-4 py-2 pl-10">
            <div class="absolute top-0 flex items-center h-full ml-3">
                <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="idea-container space-y-6 my-6">
        <div class="idea-container hover:shadow-sm transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border border-gray-200 hover:bg-gray-400 font-bold text-xs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">
                        Vote
                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ea tenetur dolorem perspiciatis. Quia quae quidem voluptatibus magnam aut cupiditate sed cumque iusto provident. Nulla voluptas eveniet quod soluta commodi.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category</div>
                            <div>&bull;</div>
                            <div class="text-gray-700">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-gray-200 text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                Open
                            </div>
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6">
                                    <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)">
                                </svg>
                                <ul class="absolute w-44 font-semibold text-left bg-white shadow-md rounded-xl py-3 ml-8">
                                    <li><a href="#" class="hover:bg-gray-100 transition duration-150 ease-in block px-5 py-3">Mark as Spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 transition duration-150 ease-in block px-5 py-3">Delete</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- end idea container --}}

        <div class="idea-container hover:shadow-sm transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl text-blue-400 hover:text-blue-500">12</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-blue-400 border border-blue-400 hover:bg-blue-500 text-white font-bold text-xs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">
                        Voted
                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ea tenetur dolorem perspiciatis. Quia quae quidem voluptatibus magnam aut cupiditate sed cumque iusto provident. Nulla voluptas eveniet quod soluta commodi.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category</div>
                            <div>&bull;</div>
                            <div class="text-gray-700">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-yellow-500 text-white text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                In Progress
                            </div>
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6">
                                    <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)">
                                </svg>
                                <ul class="absolute w-44 font-semibold text-left bg-white shadow-md rounded-xl py-3 ml-8 hidden">
                                    <li><a href="#" class="hover:bg-gray-100 transition duration-150 ease-in block px-5 py-3">Mark as Spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 transition duration-150 ease-in block px-5 py-3">Delete</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- end idea container --}}

        <div class="idea-container hover:shadow-sm transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border border-gray-200 hover:bg-gray-400 font-bold text-xs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">
                        Vote
                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ea tenetur dolorem perspiciatis. Quia quae quidem voluptatibus magnam aut cupiditate sed cumque iusto provident. Nulla voluptas eveniet quod soluta commodi.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category</div>
                            <div>&bull;</div>
                            <div class="text-gray-700">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-red-500 text-white text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                Closed
                            </div>
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6">
                                    <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)">
                                </svg>
                                <ul class="absolute w-44 font-semibold text-left bg-white shadow-md rounded-xl py-3 ml-8 hidden">
                                    <li><a href="#" class="hover:bg-gray-100 transition duration-150 ease-in block px-5 py-3">Mark as Spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 transition duration-150 ease-in block px-5 py-3">Delete</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- end idea container --}}

        <div class="idea-container hover:shadow-sm transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border border-gray-200 hover:bg-gray-400 font-bold text-xs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">
                        Vote
                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ea tenetur dolorem perspiciatis. Quia quae quidem voluptatibus magnam aut cupiditate sed cumque iusto provident. Nulla voluptas eveniet quod soluta commodi.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category</div>
                            <div>&bull;</div>
                            <div class="text-gray-700">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-green-500 text-white text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                Implemented
                            </div>
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6">
                                    <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)">
                                </svg>
                                <ul class="absolute w-44 font-semibold text-left bg-white shadow-md rounded-xl py-3 ml-8 hidden">
                                    <li><a href="#" class="hover:bg-gray-100 transition duration-150 ease-in block px-5 py-3">Mark as Spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 transition duration-150 ease-in block px-5 py-3">Delete</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- end idea container --}}

        <div class="idea-container hover:shadow-sm transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border border-gray-200 hover:bg-gray-400 font-bold text-xs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">
                        Vote
                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero ea tenetur dolorem perspiciatis. Quia quae quidem voluptatibus magnam aut cupiditate sed cumque iusto provident. Nulla voluptas eveniet quod soluta commodi.
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category</div>
                            <div>&bull;</div>
                            <div class="text-gray-700">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-purple-500 text-xs text-white font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                Considering
                            </div>
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6">
                                    <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)">
                                </svg>
                                <ul class="absolute w-44 font-semibold text-left bg-white shadow-md rounded-xl py-3 ml-8 hidden">
                                    <li><a href="#" class="hover:bg-gray-100 transition duration-150 ease-in block px-5 py-3">Mark as Spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 transition duration-150 ease-in block px-5 py-3">Delete</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> {{-- end idea container --}}

    </div>
</x-app-layout>
