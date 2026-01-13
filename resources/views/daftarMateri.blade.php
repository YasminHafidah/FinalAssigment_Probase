@php
    $navLinks = [
        ['name' => 'Dashboard', 'href' => '/dashboard', 'active' => request()->is('dashboard')],
        ['name' => 'Daftar Materi', 'href' => '/materi', 'active' => request()->is('materi*')],
    ];
@endphp

<x-layoutModul>
    @section('title', 'E-Module - ProBase')
    <x-Navbar :links="$navLinks" />
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 leading-[120%]">
        <h1 class="text-4xl font-extrabold text-['#0B132B'] text-balance text-center">Selamat Datang di E-Module
            Perancangan Basis Data!
        </h1>
        <h2 class="text-balance text-center mt-8 text-xl">E-Module ini untuk membekali kalian sebelum mengerjakan diskusi
            proyek, silahkan ikuti alur materi dibawah
            ini!</h2>
        <br>
        @forelse ($categories as $category)
            <div class="flex flex-col space-y-6 mt-3 bg-[#E49273] p-3 rounded-md">
                <h1 class="text-2xl font-bold text-[#0B132B] justify-center">{{ $category->category }}</h1>
            </div>
            <div class="flex flex-col space-y-4 mt-3">
                @forelse ($category->moduls as $module)
                    @if ($module->akses)
                        <a href={{ url('/materi/' . $module->slug) }}
                            class="ml-10 rounded-md bg-[#0B132B] px-10 py-2 text-2xl font-bold text-white shadow-xs hover:bg-[#8093F1] 
                   flex items-center gap-x-4">

                            <svg class="w-8 h-8 flex-shrink-0 mr-4" viewBox="0 0 54 53" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    class="{{ $module->selesai ?? false ? 'fill-green-500 stroke-green-600' : 'stroke-[#E8F1F2]' }}"
                                    d="M27.0007 50.25C40.3475 50.25 51.1673 39.6168 51.1673 26.5C51.1673 13.3832 40.3475 2.75 27.0007 2.75C13.6538 2.75 2.83398 13.3832 2.83398 26.5C2.83398 39.6168 13.6538 50.25 27.0007 50.25Z"
                                    stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                @if ($module->selesai)
                                    <path d="M16.5 26.5L24.75 34.75L37.5 18.25" stroke="white" stroke-width="4"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                @endif
                            </svg>

                            <span>{{ $module->title }}</span>
                        @else
                            <div
                                class="ml-10 rounded-md bg-gray-200 px-10 py-2 text-2xl font-extrabold text-gray-500 shadow-xs flex items-center cursor-not-allowed opacity-60">
                                <svg class="w-8 h-8 flex-shrink-0 mr-4" viewBox="0 0 54 53" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path class="fill-gray-300 stroke-gray-400"
                                        d="M27.0007 50.25C40.3475 50.25 51.1673 39.6168 51.1673 26.5C51.1673 13.3832 40.3475 2.75 27.0007 2.75C13.6538 2.75 2.83398 13.3832 2.83398 26.5C2.83398 39.6168 13.6538 50.25 27.0007 50.25Z"
                                        stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                                <span> {{ $module->title }}</span>
                            </div>
                    @endif


                    </a>
                @empty
                    <p class="ml-10">Belum ada materi.</p>
                @endforelse
            </div>
        @empty
            <p>Belum ada kategori</p>
        @endforelse
    </div>
</x-layoutModul>
