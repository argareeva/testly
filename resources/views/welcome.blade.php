<x-site-layout title="Testly">
    <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach($applications as $application)
            <a href="{{ route('applications.show', $application->id) }}" class="block p-4 border rounded-lg shadow-sm hover:shadow-md hover:border-blue-400 transition">
                <h2 class="font-bold text-lg text-blue-600 truncate">
                    {{$application->name}}
                </h2>
                <div class="text-sm text-gray-500 mt-1">
                    {{ \Carbon\Carbon::parse($application->published_at)->format('Y-m-d') }} |
                    {{$application->author?->name ?? 'Unknown'}}
                </div>
                <div class="mt-2 flex flex-wrap gap-1">
                    @foreach($application->categories as $category)
                        <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-xs">
                            {{$category->title}}
                        </span>
                    @endforeach
                </div>
                <p class="text-sm text-gray-700 mt-3">
                    {{ $application->summary(50) }}
                </p>
            </a>
        @endforeach
    </div>
</x-site-layout>
