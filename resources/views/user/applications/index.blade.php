<x-site-layout title="Applications">
    <div class="mb-4">
        <a href="{{ route('user.applications.create') }}" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-blue-600">
            Create Application
        </a>
    </div>

    @if(session()->has('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 p-3 rounded mb-4">
            {!! session('success') !!}
        </div>
    @endif

    <ul class="divide-y divide-gray-200">
        @forelse($applications as $application)
            <li class="flex items-center justify-between py-2">
                <span class="font-semibold">{{ $application->name }}</span>
                <div class="flex items-center space-x-3">
                    @if($application->published_at === null)
                        <a href="{{route('user.applications.publish', $application)}}" class="text-green-600 hover:underline">Publish</a>
                    @else
                        <span class="text-xs text-gray-500">Published</span>
                    @endif
                    <a href="{{ route('user.applications.edit', $application) }}" class="text-blue-500 hover:underline">
                        Edit
                    </a>
                    <form action="{{ route('user.applications.destroy', $application) }}" method="POST" class="inline-block">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="text-red-500 hover:underline">
                            Delete
                        </button>
                    </form>
                </div>
            </li>
        @empty
            <li class="text-gray-500">No applications found.</li>
        @endforelse
    </ul>
</x-site-layout>
