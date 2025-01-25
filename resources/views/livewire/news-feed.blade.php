<div class="p-6 bg-gradient-to-r from-blue-400 to-blue-500 text-white rounded-lg shadow-md mb-8 flex flex-col gap-6">
    <div>
        <label for="category" class="block text-sm font-medium mb-2">Select Category</label>
        <select id="category"
                class="block w-full p-2 rounded-lg bg-blue-300 text-white focus:ring focus:ring-blue-200">
            @foreach($categories as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex items-center gap-6">
        <div class="flex-1">
            <h2 class="text-2xl font-bold mb-2">Latest News</h2>
            @if($news === '')
                <p class="text-lg">News loading...</p>
            @else
                <p class="text-lg mb-4">{{ $news }}</p>
                <div class="mt-2">
                    <span class="block text-sm font-medium">Author: {{ $author }}</span>
                    <a href="{{ $url }}" target="_blank" class="text-sm text-blue-200 underline hover:text-white">
                        Read More
                    </a>
                </div>
            @endif
        </div>

        @if($urlToImage)
            <div class="flex-shrink-0">
                <img src="{{ $urlToImage }}" alt="News Image" class="rounded-lg shadow-md max-w-xs max-h-40 object-cover">
            </div>
        @endif
    </div>

    <div>
        <a wire:click="updateCategory"
           class="bg-blue-200 text-blue-500 px-4 py-2 rounded cursor-pointer hover:bg-blue-300 transition">
            Update News
        </a>
    </div>
</div>
