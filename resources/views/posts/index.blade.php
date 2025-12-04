<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-6">
                    <h3 class="text-2xl">{{ __('Data Posts') }}</h3>
                    <a href="{{ route('posts.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Add Posts</a>
                    <div class="overflow-x-auto border border-gray-200 dark:border-gray-700 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-900">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium tracking-wider uppercase">
                                        #
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium tracking-wider uppercase">
                                        Title
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium tracking-wider uppercase">
                                        Status
                                    </th>
                                    <th class="px-4 py-3 text-xs font-medium tracking-wider uppercase">
                                        Action
                                    </th>

                                </tr>
                            </thead>

                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-100 dark:divide-gray-700">
                                @forelse ($posts as $post)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-3">{{ $post->title }}</td>
                                        <td class="px-4 py-3 capitalize">{{ $post->status }}</td>
                                        <td class="px-4 py-3 flex justify-center space-x-3">
                                            <a href="{{ route('posts.show', $post->id) }}" class="text-sky-700 hover:text-sky-500 dark:text-sky-500 dark:hover:text-sky-700 text-base no-underline hover:underline">Details</a>
                                            <span>|</span>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="text-amber-700 hover:text-amber-500 dark:text-amber-500 dark:hover:text-amber-700 text-base no-underline hover:underline">Edit</a>
                                            <span>|</span>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-rose-700 hover:text-rose-500 dark:text-rose-500 dark:hover:text-rose-700 text-base no-underline hover:underline" onclick="return confirm('Are you sure want to delete this post?')">Delete</button>
                                            </form>

                                        </td>
                                    </tr>

                                @empty
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                        <td class="px-4 py-3 text-center" colspan="4">{{ __('No data available yet') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
