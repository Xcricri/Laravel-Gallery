<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h3 class="text-lg font-semibold mb-4">Latest Galleries</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        @forelse($latestGalleries as $gallery)
                            <div class="bg-gray-300 dark:bg-gray-900 rounded-lg overflow-hidden flex flex-col">

                                <div class="text-base font-semibold text-gray-900 dark:text-gray-200 px-2 mt-2">
                                    {{ $gallery->title }}
                                </div>

                                <!-- Gambar persegi 1:1 -->
                                <div class="w-full aspect-square">
                                    <img src="{{ asset('storage/'.$gallery->cover) }}"
                                            alt="{{ $gallery->title }}"
                                            class="w-full h-full object-cover ">
                                </div>

                                <div class="text-sm text-gray-700 dark:text-gray-400 px-2 py-1">
                                    {{ $gallery->description }}
                                </div>

                            </div>
                        @empty
                            <div class="col-span-4 text-center text-gray-900 dark:text-white">
                                No galleries found.
                            </div>
                        @endforelse
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
