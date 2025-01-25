<x-site-layout title="Tested applications">
    <!-- Display Total Points -->
    <div class="mb-6 text-lg font-bold text-blue-600 text-center">
        Total Points: {{ auth()->user()->num_of_scores}}
    </div>

    <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach($applications as $application)
            @if($application->feedback->where('user_id', auth()->user()->id)->count() > 0)
                <a href="{{ route('applications.show', $application->id) }}"
                    class="block overflow-hidden rounded-lg border shadow-sm hover:shadow-md hover:border-blue-400 transition transform hover:scale-105">

                    <!-- Application Image -->
                    <div class="flex justify-center items-center bg-gray-100 h-40">
                        <img src="{{ $application->media->first() ? $application->media->first()->getUrl() : asset('images/default-image.jpg') }}"
                            alt="{{ $application->name }}"
                            class="h-full w-auto max-h-40 object-contain">
                    </div>

                    <!-- Application Content -->
                    <div class="p-4">
                        <!-- Name -->
                        <h2 class="font-bold text-lg text-gray-800 truncate">
                            {{ $application->name }}
                        </h2>

                        <!-- Author and Date -->
                        <div class="text-sm text-gray-500 mt-1 flex justify-between">
                            <span>By: {{ $application->author?->name ?? 'Unknown' }}</span>
                            <span>{{ \Carbon\Carbon::parse($application->published_at)->format('Y-m-d') }}</span>
                        </div>

                        <!-- Categories -->
                        <div class="mt-2 flex flex-wrap gap-1">
                            @foreach($application->categories as $category)
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs">
                                    {{ $category->title }}
                                </span>
                            @endforeach
                        </div>

                        <!-- Summary -->
                        <p class="text-sm text-gray-700 mt-3">
                            {{ $application->summary(50) }}
                        </p>
                    </div>
                </a>
            @endif
        @endforeach
    </div>
</x-site-layout>
