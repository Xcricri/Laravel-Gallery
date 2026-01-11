<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Photos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <!-- Page Title -->
                <h3 class="text-2xl mb-6 dark:text-gray-200 font-semibold">{{ __('Photos') }}</h3>

                <form action="{{ route('photos.index') }}" method="GET" class="flex gap-4 mb-6">
                    <a href="{{ route('photos.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Add Photo
                    </a>

                    <select name="gallery_id" id="gallery_id" onchange="this.form.submit()" class="rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm">
                        <option value="">Filter by Gallery</option>
                        @foreach($galleries as $gallery)
                            <option value="{{ $gallery->id }}" {{ request('gallery_id') == $gallery->id ? 'selected' : '' }}>
                                {{ $gallery->title }}
                            </option>
                        @endforeach
                    </select>
                </form>

                <!-- Grid Photos -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($photos as $photo)
                    <div class=" rounded-lg overflow-hidden shadow hover:shadow-lg transition duration-200">
                            <div class="bg-gray-300 dark:bg-gray-900 rounded-lg overflow-hidden flex flex-col p-4">
                                <h4 class="font-semibold dark:text-gray-200">{{ $photo->title }}</h4>
                            </div>

                            <img src="{{ asset('storage/' . $photo->file_path) }}" alt="{{ $photo->title }}" class="w-full h-48 object-cover">
                            
                        </div>
                    @empty
                        <p class="col-span-full text-gray-500 dark:text-gray-300 text-center">No photos available.</p>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
