<x-site-layout title="Submit Feedback">
    <div class="max-w-3xl mx-auto space-y-6">
        <h1 class="text-2xl font-bold text-gray-800">Feedback for {{ $application->name }}</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-600 p-4 rounded">
                {!! session('success') !!}
            </div>
        @endif

        <form action="{{ route('feedback.store', ['application' => $application->id]) }}" method="POST" class="space-y-4">
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

            <!-- Recommendation (Scale 1 to 5) -->
            <div>
                <label for="recommendation" class="block text-sm font-medium text-gray-700">Recommendation (1 = Worst, 5 = Best)</label>
                <input
                    type="range"
                    id="recommendation"
                    name="recommendation"
                    min="1"
                    max="5"
                    step="1"
                    value="{{ old('recommendation', 3) }}"
                    class="w-full"
                >
                <div class="flex justify-between text-sm mt-2">
                    <span>1</span>
                    <span>2</span>
                    <span>3</span>
                    <span>4</span>
                    <span>5</span>
                </div>
                @error('recommendation')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Functionality (Scale 1 to 5) -->
            <div>
                <label for="functionality" class="block text-sm font-medium text-gray-700">Functionality (1 = Worst, 5 = Best)</label>
                <input
                    type="range"
                    id="functionality"
                    name="functionality"
                    min="1"
                    max="5"
                    step="1"
                    value="{{ old('functionality', 3) }}"
                    class="w-full"
                >
                <div class="flex justify-between text-sm mt-2">
                    <span>1</span>
                    <span>2</span>
                    <span>3</span>
                    <span>4</span>
                    <span>5</span>
                </div>
                @error('functionality')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Usability (Scale 1 to 5) -->
            <div>
                <label for="usability" class="block text-sm font-medium text-gray-700">Usability (1 = Worst, 5 = Best)</label>
                <input
                    type="range"
                    id="usability"
                    name="usability"
                    min="1"
                    max="5"
                    step="1"
                    value="{{ old('usability', 3) }}"
                    class="w-full"
                >
                <div class="flex justify-between text-sm mt-2">
                    <span>1</span>
                    <span>2</span>
                    <span>3</span>
                    <span>4</span>
                    <span>5</span>
                </div>
                @error('usability')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Update Me: Yes or No -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Would you like to receive updates?</label>

                <div class="flex items-center space-x-4">
                    <!-- Yes checkbox -->
                    <div class="flex items-center">
                        <input
                            type="radio"
                            id="update_me_yes"
                            name="update_me"
                            value=true
                            class="mr-2"
                        >
                        <label for="update_me_yes" class="text-sm">Yes</label>
                    </div>

                    <!-- No checkbox -->
                    <div class="flex items-center">
                        <input
                            type="radio"
                            id="update_me_no"
                            name="update_me"
                            value=false
                            class="mr-2"
                        >
                        <label for="update_me_no" class="text-sm">No</label>
                    </div>
                </div>

                @error('update_me')
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
