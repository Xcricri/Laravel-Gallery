<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Galleries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">

                <!-- Page Title -->
                <h3 class="text-2xl mb-4 dark:text-gray-200">{{ __('Galleries') }}</h3>

                <!-- Add Gallery Button -->
                <a href="{{ route('galleries.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mb-6">
                    Add Gallery
                </a>

                <!-- Grid Gallery -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    @forelse($galleries as $gallery)
                        <div class="bg-gray-300 dark:bg-gray-900 rounded-lg overflow-hidden flex flex-col">

                            <!-- Gallery Link -->
                            <a href="{{ route('galleries.show', $gallery->id) }}" class="flex-1">
                                <!-- Title -->
                                <div class="text-lg text-gray-900 dark:text-gray-200 font-semibold px-2 mt-2">
                                    {{ $gallery->title }}
                                </div>

                                <!-- Cover Image (1:1 ratio) -->
                                <div class="w-full aspect-square">
                                    <img src="{{ asset('storage/'.$gallery->cover) }}"
                                            alt="{{ $gallery->title }}"
                                            class="w-full h-full object-cover">
                                </div>

                                <!-- Description -->
                                <div class="text-base text-gray-700 dark:text-gray-400 px-2 py-1">
                                    {{ $gallery->description }}
                                </div>
                            </a>

                            <!-- Action Buttons -->
                            <div class="flex justify-end gap-2 px-2 py-1">
                                <!-- Edit Button -->
                                <a href="{{ route('galleries.edit', $gallery->id) }}"
                                    class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                                    Edit
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('galleries.destroy', $gallery->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this gallery?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                                        Delete
                                    </button>
                                </form>
                            </div>

                        </div>
                    @empty
                        <div class="col-span-4 text-2xl text-center text-gray-900 dark:text-white">
                            {{ __('No gallery data') }}
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
