<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-semibold">Add Gallery</h3>
                    <hr class="border-1 border-gray-500 dark:border-gray-200 mt-2">
                    <form action="{{ route('galleries.store') }}" method="post" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        {{-- div for title --}}
                        <div>
                            <div class="flex">
                                <x-input-label for="title" :value="__('Title')"/>
                                <span class="text-rose-600 text-xs ms-1">*</span>
                            </div>
                            <x-text-input id="title" class="mt-1 block w-full" name="title" :value="old('title')"/>
                            <x-input-error :messages="$errors->addGallery->get('title')" class="mt-2"/>
                        </div>
                        {{-- div for cover --}}
                        <div>
                            <div class="flex">
                                <x-input-label for="cover" :value="__('Cover')"/>
                                <span class="text-rose-600 text-xs ms-1">*</span>
                            </div>
                            <x-text-input id="cover" class="mt-1 block w-full" name="cover" :value="old('cover')" type="file"/>
                            <x-input-error :messages="$errors->addGallery->get('cover')" class="mt-2"/>
                        </div>
                        {{-- div for post --}}
                        <div>
                            <div class="flex">
                                <x-input-label for="post" :value="__('Post')"/>
                                <span class="text-rose-600 text-xs ms-1">*</span>
                            </div>
                            <select name="post" id="post" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1">
                                @foreach ($posts as $post)
                                    <option value="{{ $post->id }}" {{ old('post') == $post->id ? 'selected' : '' }}>{{ $post->title }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->addGallery->get('post')" class="mt-2"/>
                        </div>
                        {{-- div for status --}}
                        <div>
                            <div class="flex">
                                <x-input-label for="status" :value="__('Status')"/>
                                <span class="text-rose-600 text-xs ms-1">*</span>
                            </div>
                            <select name="status" id="status" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1">
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            </select>
                            <x-input-error :messages="$errors->addGallery->get('post')" class="mt-2"/>
                        </div>
                        {{-- div for position --}}
                        <div>
                            <div class="flex">
                                <x-input-label for="position" :value="__('Position')"/>
                                <span class="text-rose-600 text-xs ms-1">*</span>
                            </div>
                            <select name="position" id="position" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1">
                                <option value="1" {{ old('position') == '1' ? 'selected' : '' }}>First</option>
                                <option value="2" {{ old('position') == '2' ? 'selected' : '' }}>Second</option>
                            </select>
                            <x-input-error :messages="$errors->addGallery->get('post')" class="mt-2"/>
                        </div>
                        <div>
                            <x-primary-button>{{ __('Add') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
