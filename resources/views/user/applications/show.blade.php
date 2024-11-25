<x-site-layout title="{{ $application->name }}">

    <div class="max-w-4xl mx-auto my-8">
        {{-- Display application image --}}
        <div class="mb-6">
{{--            @dd($application->media->first()->getUrl());--}}

            <img src="{{ optional($application->media->first())->getUrl() ?? asset('images/default-image.jpg') }}"
                 alt="{{ $application->name }}"
                 class="w-1/2 mx-auto rounded-lg shadow-lg">
        </div>

        {{-- Author Information --}}
        @if($application->author)
            <p class="text-gray-600 mb-2">
                <span class="font-semibold">Author:</span> {{ $application->author->name }}
            </p>
        @endif

        {{-- Categories --}}
        @if($application->categories && $application->categories->count() > 0)
            <p class="text-gray-600 mb-6">
                <span class="font-semibold">Categories:</span>
                @foreach($application->categories as $category)
                    <span class="inline-block bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-3 py-1 rounded">
                        {{ $category->name }}
                    </span>
                @endforeach
            </p>
        @endif

        {{-- Application Description --}}
        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Description</h2>
            <p class="text-gray-800 text-lg">
                {{ $application->description }}
            </p>
        </div>
    </div>

</x-site-layout>
