<x-layoutModul>
    <x-navbar>
        <x-nav-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-nav-link>
        <x-nav-link href="/materi" :active="request()->is('daftarMateri')">Daftar Materi</x-nav-link>
    </x-navbar>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-blue-950 justify-center">Selamat Datang di E-Modul Basis Data silahkan ikuti
            alur materi berikut!</h1>
        <br>
        <h1 class="text-2xl font-bold text-blue-800 justify-center">Conceptual Design</h1>
        <div class="flex flex-col space-y-4 mt-10">
            @if ($modules->isEmpty())
                <p>Belum ada materi yang tersedia</p>
            @else
                @foreach ($modules as $module)
                    <a href={{ url('/materi/' . $module->slug) }}
                        class="rounded-md bg-indigo-600 px-10 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        {{ $module->title }}</a>
                @endforeach
            @endif
        </div>
    </div>
</x-layoutModul>
