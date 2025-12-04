<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-semibold">Add Post</h3>
                    <hr class="border-1 border-gray-500 dark:border-gray-200 mt-2">
                    <form action="{{ route('posts.store') }}" method="post" class="mt-6 space-y-6" >
                        @csrf
                        {{-- div for name --}}
                        <div>
                            <div class="flex">
                                <x-input-label for="title" :value="__('Title')"/>
                                <span class="text-rose-600 text-xs ms-1">*</span>
                            </div>
                            <x-text-input id="title" class="mt-1 block w-full" name="title" :value="old('title')"/>
                            <x-input-error :messages="$errors->addPost->get('title')" class="mt-2"/>
                        </div>
                        {{-- div for category_id --}}
                        <div>
                            <div class="flex">
                                <x-input-label for="category_id" :value="__('Category')"/>
                                <span class="text-rose-600 text-xs ms-1">*</span>
                            </div>
                            <select name="category_id" id="category_id" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->addPost->get('category_id')" class="mt-2"/>
                        </div>
                        {{-- div for status --}}
                        <div>
                            <div class="flex">
                                <x-input-label for="status" :value="__('Status')"/>
                                <span class="text-rose-600 text-xs ms-1">*</span>
                            </div>
                            <select name="status" id="status" class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1">
                                <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                            <x-input-error :messages="$errors->addPost->get('status')" class="mt-2"/>
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
