<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Details')  }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex px-4 py-6">
                        <div class="w-1/3 flex flex-col items-center space-y-2 mt-5">
                            <h3 class="text-2xl font-semibold">{{ $user->name }}</h3>
                            <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}" class="h-40 w-40 rounded-full">
                            <h4 class="text-xl text-gray-600 dark:text-gray-200">{{ $user->email }}</h4>
                        </div>
                        <div class="w-2/3">
                            <div class="grid grid-cols-3 gap-4 mx-4">
                                <a href="#" class="flex flex-col">
                                    <img src="https://dummyimage.com/600x400/000/fff" alt="" class="rounded-lg">
                                    <span class="text-lg text-center mt-3">Gallery Title</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
