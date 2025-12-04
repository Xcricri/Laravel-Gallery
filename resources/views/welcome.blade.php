<!DOCTYPE html>
<html lang="en" class="dark"> {{-- hapus "dark" jika ingin default terang --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 font-sans">

    {{-- NAVBAR --}}
    <nav class="bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 sticky w-full z-20 top-0 border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-screen-xl mx-auto p-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gray-300 dark:bg-gray-700 rounded"></div>

                <div>
                    <h1 class="text-lg font-bold">SMK INDONESIA DIGITAL</h1>
                    <p class="text-xs text-gray-600 dark:text-gray-300">maju seiring perkembangan digital</p>
                </div>
            </div>

            <div>
                @guest
                    <a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400">Login</a>
                @else
                    <a href="{{ route('dashboard') }}" class="text-blue-600 dark:text-blue-400">Dashboard</a>
                @endguest
            </div>
        </div>
    </nav>

    {{-- HERO IMAGE --}}
    <section class="w-full flex justify-center py-4">
        <div class="w-32 h-32 bg-gray-300 dark:bg-gray-700 rounded"></div>
    </section>

    {{-- GALERI & JUDUL BERITA --}}
    <section class="w-full max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-2 px-3">

        {{-- Thumbnail kiri --}}
        <div class="col-span-1 flex flex-col gap-2">
            <div class="w-full h-24 bg-gray-300 dark:bg-gray-700 rounded"></div>
        </div>

        {{-- Judul berita --}}
        <div class="col-span-2 bg-green-100 dark:bg-green-900 p-3 rounded">
            <h2 class="font-semibold text-base">Judul</h2>
            <p class="text-xs mt-1 text-gray-700 dark:text-gray-200">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Quam in et harum minus consequuntur.
            </p>
        </div>

    </section>

    {{-- AGENDA & INFO TERBARU --}}
    <section class="w-full max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-2 px-3 mt-3">

        {{-- Agenda Sekolah --}}
        <div class="bg-red-600 dark:bg-red-700 text-white p-3 rounded">
            <h3 class="font-bold mb-1 text-sm">AGENDA SEKOLAH</h3>
            <ul class="list-disc ml-4 text-xs">
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Mi viverra pellentesque magna diam.</li>
                <li>Id malesuada amet urna quam eget.</li>
                <li>Ut donec in tellus dolor felis sed.</li>
            </ul>
        </div>

        {{-- Informasi Terbaru --}}
        <div class="bg-gray-200 dark:bg-gray-800 p-3 rounded">
            <h3 class="font-bold text-sm">INFORMASI TERBARU</h3>
            <div class="w-full h-32 bg-gray-300 dark:bg-gray-700 mt-2 rounded"></div>
            <p class="text-xs mt-1 text-gray-700 dark:text-gray-300">
                Lorem ipsum dolor sit amet consectetur.
            </p>
        </div>

    </section>

    {{-- PETA SEKOLAH --}}
    <section class="w-full max-w-4xl mx-auto px-3 mt-3">
        <h3 class="font-bold text-sm">PETA SEKOLAH</h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mt-1">

            <div class="bg-white dark:bg-gray-800 p-3 shadow rounded">
                <p class="text-xs text-gray-800 dark:text-gray-300">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Nisi voluptatem numquam vitae magni nemo quas assumenda.
                </p>
            </div>

            <div class="col-span-2">
                <div class="w-full h-32 bg-gray-300 dark:bg-gray-700 rounded"></div>
            </div>

        </div>
    </section>

    <footer class="text-center py-4 mt-4 text-gray-600 dark:text-gray-400 text-sm">
        "SELAMAT & SUKSES"
    </footer>

</body>
</html>
