<x-site-layout title="{{ $application->name }}">
    <div class="max-w-4xl mx-auto space-y-6">
        <div class="flex flex-col space-y-2 text-sm text-gray-500">
            <div>
                <strong>Author name:</strong> {{ $application->author?->name ?? 'Unknown' }}
            </div>
            <div>
                <strong>Date published:</strong> {{ \Carbon\Carbon::parse($application->published_at)->format('Y-m-d') }}
            </div>
        </div>

        <!-- Categories -->
        @if($application->categories->isNotEmpty())
            <div class="flex flex-wrap gap-2">
                @foreach($application->categories as $category)
                    <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-xs">
                        {{ $category->title }}
                    </span>
                @endforeach
            </div>
        @endif
        <p class="text-xl text-gray-800">
            {{ $application->description }}
        </p>

        <!-- Feedback Form Button -->
        <div class="mt-6">
            <a href="{{ route('feedback.create', $application->id) }}"
               class="bg-gray-800 text-white px-6 py-2 rounded shadow hover:bg-blue-600 transition">
                Get Feedback Form
            </a>
        </div>
    </div>
</x-site-layout>
