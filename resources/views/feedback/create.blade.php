<x-site-layout title="Submit Feedback">
    <div class="max-w-3xl mx-auto space-y-6">
        <h1 class="text-2xl font-bold text-gray-800">Feedback for {{ $application->name }}</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-600 p-4 rounded">
                {!! session('success') !!}
            </div>
        @endif

        <form action="{{ route('feedback.store', $application) }}" method="POST" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded p-2 mt-1"
                    placeholder="Enter your name"
                    required
                >
                @error('name')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full border border-gray-300 rounded p-2 mt-1"
                    placeholder="Enter your email"
                    required
                >
                @error('email')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Feedback -->
            <div>
                <label for="feedback" class="block text-sm font-medium text-gray-700">Your Feedback</label>
                <textarea
                    id="feedback"
                    name="feedback"
                    class="w-full border border-gray-300 rounded p-2 mt-1"
                    placeholder="Write your feedback here..."
                    rows="5"
                    required
                >{{ old('feedback') }}</textarea>
                @error('feedback')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600 transition">
                    Submit Feedback
                </button>
            </div>
        </form>
    </div>
</x-site-layout>
