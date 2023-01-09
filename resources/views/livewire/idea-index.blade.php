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
            <div class="text-2xl font-semibold {{ $hasVoted ? 'text-blue-400' : '' }}">{{ $votesCount }}</div>
            <div class="text-gray-500">Votes</div>
        </div>

        <div class="mt-8">
            <button
                class="w-20 px-4 py-3 text-xs font-bold uppercase transition duration-150 ease-in rounded-xl border
                {{
                    $hasVoted ?
                    'bg-blue-400 border-blue-400 hover:bg-blue-500 text-white' :
                    'bg-gray-200 border-gray-200 hover:bg-gray-400'
                }}"
            >
                {{
                    $hasVoted ?
                    'Voted' :
                    'Vote'
                }}
            </button>
        </div>
    </div>
    <div class="flex flex-col flex-1 px-2 py-6 md:flex-row ">
        <div class="flex-none mx-4 md:mx-0">
            <a href="#">
                <img src="{{ $idea->user->getAvatar() }}"
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
                    <div>{{ $idea->category->name }}</div>
                    <div>&bull;</div>
                    <div class="text-gray-700">3 Comments</div>
                </div>

                <div x-data="{ isOpen: false }" class="flex items-center mt-4 space-x-2 md:mt-0">
                    <div class="py-2 text-xs font-bold leading-none text-center uppercase rounded-full w-28 h-7 status-{{ Str::kebab($idea->status->name) }}">
                        {{ $idea->status->name }}
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
                        <div class="text-sm font-bold leading-none {{ $hasVoted ? 'text-blue-400' : '' }}">{{ $votesCount }}</div>
                        <div class="text-xs font-semibold leading-none text-gray-400">Votes</div>
                    </div>
                    <button
                        class="w-20 px-4 py-3 -m-5 text-xs font-bold uppercase transition duration-150 ease-in rounded-xl border
                        {{
                            $hasVoted ?
                            'bg-blue-400 border-blue-400 hover:bg-blue-500 text-white' :
                            'bg-gray-200 border-gray-200 hover:bg-gray-300'
                        }}"
                    >
                        {{
                            $hasVoted ?
                            'Voted' :
                            'Vote'
                        }}
                    </button>
                </div>

            </div>
        </div>
    </div>
</div> {{-- end idea container --}}
