<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Photo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-semibold mb-2">Add Photo</h3>
                    <hr class="border-gray-500 dark:border-gray-200 mb-6">

                    <form action="{{ route('photos.store') }}" method="POST" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf

                        {{-- div for title --}}
                        <div>
                            <div class="flex">
                                <x-input-label for="title" :value="__('Title')"/>
                                <span class="text-rose-600 text-xs ms-1">*</span>
                            </div>
                            <x-text-input id="title" class="mt-1 block w-full" name="title" :value="old('title')"/>
                            <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                        </div>

                        {{-- div for photo --}}
                        <div>
                            <div class="flex">
                                <x-input-label for="file_path" :value="__('Photo')"/>
                                <span class="text-rose-600 text-xs ms-1">*</span>
                            </div>
                            <x-text-input id="file_path" class="mt-1 block w-full" name="file_path" type="file"/>
                            <x-input-error :messages="$errors->get('file_path')" class="mt-2"/>
                        </div>

                        {{-- div for gallery --}}
                        <div>
                            <div class="flex">
                                <x-input-label for="gallery_id" :value="__('Gallery')"/>
                                <span class="text-rose-600 text-xs ms-1">*</span>
                            </div>
                            <select name="gallery_id" id="gallery_id" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1">
                                @foreach ($galleries as $gallery)
                                    <option value="{{ $gallery->id }}" {{ old('gallery_id') == $gallery->id ? 'selected' : '' }}>
                                        {{ $gallery->title }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('gallery_id')" class="mt-2"/>
                        </div>

                        {{-- submit button --}}
                        <div>
                            <x-primary-button>{{ __('Add Photo') }}</x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
