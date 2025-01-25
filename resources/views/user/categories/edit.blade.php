<x-site-layout title="Update Category">
    <form action="{{ route('user.categories.update', $category) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div>
            <label for="title" class="block text-gray-700 font-medium">Title</label>
            <input
                id="title"
                name="title"
                value="{{ old('title', $category->title) }}"
                class="w-full border border-gray-300 rounded p-2 mt-1"
                placeholder="Enter category title"
            >
            @error('title')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('user.categories.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                Cancel
            </a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Save Changes
            </button>
        </div>
    </form>
</x-site-layout>
