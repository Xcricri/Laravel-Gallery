<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-semibold">Edit Category</h3>
                    <hr class="border-1 border-gray-500 dark:border-gray-200 mt-2">
                    <form action="{{ route('categories.update', $category->id) }}" method="post" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')
                        <div>
                            <div class="flex">
                                <x-input-label for="name" :value="__('Name')"/>
                                <span class="text-rose-600 text-xs ms-1">*</span>
                            </div>
                            <x-text-input id="name" class="mt-1 block w-full" name="name" :value="old('name', $category->name)"/>
                            <x-input-error :messages="$errors->editCategory->get('name')" class="mt-2"/>
                        </div>
                        <div>
                            <x-primary-button>{{ __('Edit') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
