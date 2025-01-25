<div class="p-6 bg-gradient-to-r from-blue-400 to-blue-500 text-white rounded-lg shadow-md mb-8 flex items-center gap-6">
    <div class="flex-1">
        <h2 class="text-2xl font-bold mb-2">Latest News</h2>
        <p class="text-lg mb-4">
            {{$news}}
        </p>
        <div class="mt-2">
            <span class="block text-sm font-medium">Author: {{$author}}</span>
            <a href="{{$url}}" target="_blank" class="text-sm text-blue-200 underline hover:text-white">
                Read More
            </a>
        </div>
    </div>

    @if($urlToImage)
        <div class="flex-shrink-0">
            <img src="{{$urlToImage}}" alt="News Image" class="rounded-lg shadow-md max-w-xs max-h-40 object-cover">
        </div>
    @endif
</div>
