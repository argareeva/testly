<x-site-layout title="Categories">
    <div class="mb-4">
        <a href="{{ route('user.categories.create') }}" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-blue-600">
            Create Category
        </a>
    </div>

    @if(session()->has('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 p-3 rounded mb-4">
            {!! session('success') !!}
        </div>
    @endif

    <ul class="divide-y divide-gray-200">
        @forelse($categories as $category)
            <li class="flex items-center justify-between py-2">
                <span class="font-semibold">{{ $category->title }}</span>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('user.categories.edit', $category) }}" class="text-blue-500 hover:underline">
                        Edit
                    </a>
                    <form action="{{ route('user.categories.destroy', $category) }}" method="POST" class="inline-block">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">
                            Delete
                        </button>
                    </form>
                </div>
            </li>
        @empty
            <li class="text-gray-500">No categories found.</li>
        @endforelse
    </ul>
</x-site-layout>
