<x-site-layout title="Create New Application">
    <form action="{{ route('user.applications.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-gray-700 font-medium">Name</label>
            <input
                id="name"
                name="name"
                value="{{ old('name') }}"
                class="w-full border border-gray-300 rounded p-2 mt-1"
                placeholder="Enter application name"
            >
            @error('name')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-gray-700 font-medium">Description</label>
            <textarea
                id="description"
                name="description"
                class="w-full border border-gray-300 rounded p-2 mt-1"
                placeholder="Enter application description"
            >{{ old('description') }}</textarea>
            @error('description')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('user.applications.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                Cancel
            </a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Create Application
            </button>
        </div>
    </form>
</x-site-layout>
