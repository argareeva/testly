<x-site-layout title="{{ $category->name }}">

    <div class="max-w-4xl mx-auto my-8">

        @if($category->title)
            <p class="text-gray-600 mb-2">
                <span class="font-semibold">Title:</span> {{ $category->title }}
            </p>
        @endif

    </div>

</x-site-layout>
