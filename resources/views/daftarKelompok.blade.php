<x-layout>
    @section('title', 'Kelompok - ProBase')
    <div class="items-center mb-6 text-center">
        <h1
            class="text-4xl font-extrabold tracking-normal leading-normal text-balance text-[#0B132B] bg-[#E49273] px-30 py-2 rounded-2xl">
            {{ $namaKelompok }}
        </h1>
    </div>
    {{-- CONTAINER GRID UTAMA --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        {{-- BAGIAN KIRI: FOKUS DISKUSI (Mengambil 7 dari 12 bagian) --}}
        <div
            class="lg:col-span-7 relative z-10 h-full flex flex-col bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <h2
                class="text-2xl font-bold uppercase tracking-wider text-[#0B132B] opacity-90 mb-4 flex items-center gap-2 border-b pb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                        clip-rule="evenodd" />
                </svg>
                Fokus Diskusi Project
            </h2>

            {{-- Kotak Pertanyaan --}}
            <div
                class="flex-grow text-lg font-serif font-medium leading-relaxed text-justify p-5 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50 text-gray-800">
                {!! $question !!}
            </div>

            <div class="mt-6 pt-4">
                <p class="text-sm font-bold text-center text-gray-500 italic">
                    <span class="bg-yellow-100 px-2 py-1 rounded">Note:</span> Gunakan pertanyaan di atas sebagai
                    panduan diskusi kelompok kalian.
                </p>
            </div>
        </div>

        {{-- BAGIAN KANAN: DAFTAR ANGGOTA (Mengambil 5 dari 12 bagian) --}}
        <div class="lg:col-span-5">
            <div class="bg-[#0B132B] text-white p-4 rounded-t-xl text-center font-bold tracking-wider uppercase">
                Anggota Kelompok
            </div>

            <div class="bg-white p-6 rounded-b-xl border border-t-0 border-gray-200 shadow-sm flex flex-col gap-4">
                @foreach ($anggota as $member)
                    <div
                        class="w-full p-3 flex items-center gap-3 bg-[#E8F1F2] rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-all duration-300">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-[#0B132B] text-white flex items-center justify-center shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>

                        {{-- Nama --}}
                        <div class="text-lg font-semibold text-[#0B132B] truncate">
                            {{ $member->nama }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
