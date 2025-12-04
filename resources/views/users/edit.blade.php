<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-semibold">Edit User</h3>
                    <hr class="border-1 border-gray-500 dark:border-gray-200 mt-2">
                    <form action="{{ route('users.update', $user->id) }}" method="post" class="mt-6 space-y-6"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        {{-- div for name --}}
                        <div>
                            <div class="flex">
                                <x-input-label for="name" :value="__('Name')" />
                                <span class="text-rose-600 text-xs ms-1">*</span>
                            </div>
                            <x-text-input id="name" class="mt-1 block w-full" name="name" :value="old('name', $user->name)" />
                            <x-input-error :messages="$errors->editUser->get('name')" class="mt-2" />
                        </div>
                        {{-- div for avatar --}}
                        <div>
                            <div class="flex">
                                <x-input-label for="avatar" :value="__('Avatar')" />
                                {{-- <span class="text-rose-600 text-xs ms-1">*</span> --}}
                            </div>
                            <x-text-input id="avatar" class="mt-1 block w-full" name="avatar" :value="old('avatar', $user->avatar)"
                                type="file" />
                            <x-input-error :messages="$errors->editUser->get('avatar')" class="mt-2" />
                        </div>
                        {{-- div for role --}}
                        <div>
                            <div class="flex">
                                <x-input-label for="role" :value="__('Role')" />
                                <span class="text-rose-600 text-xs ms-1">*</span>
                            </div>
                            <select name="role" id="role"
                                class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1">
                                @php
                                    $currentRole = old('role') ?? $user->role;
                                @endphp
                                <option value=""></option>
                                <option value="admin" {{ $currentRole == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="member" {{ $currentRole == 'member' ? 'selected' : '' }}>Member</option>
                            </select>
                            <x-input-error :messages="$errors->editUser->get('role')" class="mt-2" />
                        </div>
                        {{-- div for email --}}
                        <div>
                            <div class="flex">
                                <x-input-label for="email" :value="__('Email')" />
                                <span class="text-rose-600 text-xs ms-1">*</span>
                            </div>
                            <x-text-input id="email" class="mt-1 block w-full" name="email" :value="old('email', $user->email)"
                                type="email" />
                            <x-input-error :messages="$errors->editUser->get('email')" class="mt-2" />
                        </div>
                        {{-- div for password
                        <div>
                            <div class="flex">
                                <x-input-label for="password" :value="__('Password')"/>
                                <span class="text-rose-600 text-xs ms-1">*</span>
                            </div>
                            <x-text-input id="password" class="mt-1 block w-full" name="password" :value="old('password')" type="password"/>
                            <x-input-error :messages="$errors->addUser->get('password')" class="mt-2"/>
                        </div>
                        div for password_confirmation
                        <div>
                            <div class="flex">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>
                                <span class="text-rose-600 text-xs ms-1">*</span>
                            </div>
                            <x-text-input id="password_confirmation" class="mt-1 block w-full" name="password_confirmation" :value="old('password_confirmation')" type="password"/>
                            <x-input-error :messages="$errors->addUser->get('password_confirmation')" class="mt-2"/>
                        </div> --}}
                        <div>
                            <x-primary-button>{{ __('Edit') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
