<form wire:submit.prevent='createIdea' action="#" method="POST" class="px-4 py-6 space-y-4">
    <div>
        <input wire:model.defer='title' type="text" class="w-full px-4 py-2 text-sm placeholder-gray-900 bg-gray-100 border-none rounded-xl" placeholder="Your idea" required>
        @error('title')
            <p class="mt-1 text-xs text-red-500">
                {{ $message }}
            </p>
        @enderror
    </div>
    <div>
        <select wire:model.defer='category' name="category_add" id="category_add" class="w-full px-4 py-2 text-sm bg-gray-100 border-none rounded-xl">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    @error('category')
        <p class="mt-1 text-xs text-red-500">
            {{ $message }}
        </p>
    @enderror
    <div>
        <textarea wire:model.defer='description' name="idea" id="idea" cols="30" rows="4" class="w-full px-4 py-2 text-sm placeholder-gray-900 bg-gray-100 border-none rounded-xl" placeholder="Describe your idea" required></textarea>
        @error('description')
            <p class="mt-1 text-xs text-red-500">
                {{ $message }}
            </p>
        @enderror
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

    <div>
        @if (session('success_message'))
            <div
                x-data="{ isVisible: true }"
                x-init="
                    setTimeout(() => {
                        isVisible = false
                    }, 5000)
                "
                x-show.="isVisible"
                x-transition.duration.1000ms
                class="mt-3 text-green-500">
                {{ session('success_message') }}
            </div>
        @endif
    </div>
</form>
