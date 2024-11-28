<x-site-layout title="Update Application">
    <form action="{{ route('user.applications.update', $application) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div>
            <label for="name" class="block text-gray-700 font-medium">Name</label>
            <input
                id="name"
                name="name"
                value="{{ old('name', $application->name) }}"
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
            >{{ old('description', $application->description) }}</textarea>
            @error('description')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Categories Checkboxes -->
        <div>
            <label for="categories" class="block text-gray-700 font-medium">Categories</label>
            <div class="mt-2 space-y-2">
                @foreach(\App\Models\Category::orderBy('title')->pluck('title', 'id') as $id => $title)
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            id="category-{{ $id }}"
                            name="categories[]"
                            value="{{ $id }}"
                            {{ in_array($id, old('categories', $application->categories->pluck('id')->toArray())) ? 'checked' : '' }}
                            class="h-4 w-4 border-gray-300 rounded text-blue-600 focus:ring-blue-500"
                        >
                        <label for="category-{{ $id }}" class="ml-2 text-sm text-gray-700">{{ $title }}</label>
                    </div>
                @endforeach
            </div>
            @error('categories')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image Upload -->
        <div class="mb-6">
            <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>

            <!-- File input -->
            <input type="file" name="image" id="image"
                   accept="image/*"
                   onchange="previewImage(event)"
                   class="block w-full mt-2 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                  file:rounded-full file:border-0 file:text-sm
                  file:font-semibold file:bg-blue-50 file:text-blue-700
                  hover:file:bg-blue-100">

            <!-- Image preview -->
            <div class="mt-4">
                <img id="imagePreview"
                     src="{{ $application->media->first() ? $application->media->first()->getUrl() : asset('images/default-image.jpg') }}"
                     alt="Image Preview"
                     class="w-1/3 mx-auto rounded-lg shadow-lg">
            </div>

            <!-- Error handling -->
            @php $name = 'image'; @endphp
            @include('components.form._form-error-handling')
        </div>

        <script>
            function previewImage(event) {
                const imagePreview = document.getElementById('imagePreview');
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        imagePreview.src = e.target.result; // Set preview image source to selected file
                    };
                    reader.readAsDataURL(file); // Read the file to generate a base64 string
                } else {
                    // Reset to default image if no file selected
                    imagePreview.src = "{{ asset('images/default-image.jpg') }}";
                }
            }
        </script>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('user.applications.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                Cancel
            </a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Save Changes
            </button>
        </div>
    </form>
</x-site-layout>
