<div class="p-4 bg-white rounded-lg shadow-md">
    <input
        type="text"
        wire:model.live="search"
        class="border border-gray-300 p-2 w-full rounded-lg focus:ring focus:ring-blue-200 focus:outline-none"
        placeholder="Search applications..."
    >

    <ul class="mt-4 divide-y divide-gray-200">
        @foreach($applications as $application)
            <li>
                <a
                    href="{{ route('applications.show', $application->id) }}"
                    class="block p-3 hover:bg-blue-50 transition rounded-lg"
                >
                    <div class="font-medium text-gray-800">
                        {{ $application->name }}
                    </div>
                    <div class="text-sm text-gray-500">
                        {{ $application->description ?? 'No description available' }}
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
