<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl dark:text-gray-200 font-semibold">Edit Gallery</h3>
                <hr class="border-1 border-gray-500 dark:border-gray-200 mt-2">
                <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">
                            Title
                        </label>
                        <input type="text" name="title" id="title"
                                value="{{ old('title', $gallery->title) }}"
                                class="w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-900 dark:text-gray-100"
                                required>
                        @error('title')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Cover Image -->
                    <div class="mb-4">
                        <label for="cover" class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">
                            Cover Image
                        </label>
                        <input type="file" name="cover" id="cover" accept="image/*" class="w-full text-gray-700 dark:text-gray-100">
                        @error('cover')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Status</label>
                        <select name="status" id="status" class="w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-900 dark:text-gray-100" required>
                            <option value="active" {{ old('status', $gallery->status) === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $gallery->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Related Post -->
                    <div class="mb-4">
                        <label for="post" class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Related Post</label>
                        <select name="post" id="post" class="w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-900 dark:text-gray-100" required>
                            @foreach($posts as $post)
                                <option value="{{ $post->id }}" {{ old('post', $gallery->post_id) == $post->id ? 'selected' : '' }}>
                                    {{ $post->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('post')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Position -->
                    <div class="mb-4">
                        <label for="position" class="block text-gray-700 dark:text-gray-200 font-semibold mb-1">Position</label>
                        <select name="position" id="position" class="w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:ring focus:ring-indigo-200 dark:bg-gray-900 dark:text-gray-100" required>
                            <option value="1" {{ old('position', $gallery->position) == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ old('position', $gallery->position) == 2 ? 'selected' : '' }}>2</option>
                        </select>
                        @error('position')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <x-primary-button>{{ __('Edit') }}</x-primary-button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
