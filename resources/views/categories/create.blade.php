<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-semibold">Add Category</h3>
                    <hr class="border-1 border-gray-500 dark:border-gray-200 mt-2">
                    <form action="{{ route('categories.store') }}" method="post" class="mt-6 space-y-6">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Name')"/>
                            <x-text-input id="name" class="mt-1 block w-full" name="name" :value="old('name')"/>
                            <x-input-error :messages="$errors->addCategory->get('name')" class="mt-2"/>
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
