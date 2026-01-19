<x-layout>
    @section('title', 'Kelompok - ProBase')

    {{-- HEADER JUDUL: Perbaikan padding agar tidak meluap di HP --}}
    <div class="mb-8 text-center px-4">
        <h1
            class="inline-block text-2xl md:text-4xl font-extrabold tracking-tight text-[#0B132B] bg-[#E49273] px-6 md:px-12 py-4 rounded-2xl shadow-md w-full md:w-auto">
            {{ $namaKelompok }}
        </h1>
    </div>

    {{-- CONTAINER GRID UTAMA: Penyesuaian gap dan padding --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 px-4">

        {{-- BAGIAN KIRI: FOKUS DISKUSI --}}
        <div
            class="lg:col-span-7 flex flex-col bg-white p-5 md:p-8 rounded-2xl border border-gray-200 shadow-sm transition-all">
            <h2
                class="text-xl md:text-2xl font-bold uppercase tracking-wider text-[#0B132B] opacity-90 mb-6 flex items-center gap-3 border-b pb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500 shrink-0" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                        clip-rule="evenodd" />
                </svg>
                Fokus Diskusi Project
            </h2>

            {{-- Kotak Pertanyaan --}}
            <div
                class="flex-grow text-base md:text-lg font-serif font-medium leading-relaxed text-justify p-5 md:p-6 border-2 border-dashed border-gray-300 rounded-xl bg-gray-50 text-gray-800">
                {!! $question !!}
            </div>

            <div class="mt-6 pt-4 border-t border-gray-100">
                <p class="text-xs md:text-sm font-bold text-center text-gray-500 italic">
                    <span class="bg-yellow-100 px-2 py-1 rounded text-yellow-700">Note:</span>
                    Gunakan pertanyaan di atas sebagai panduan diskusi kelompok kalian.
                </p>
            </div>
        </div>

        {{-- DAFTAR ANGGOTA --}}
        <div class="lg:col-span-5 flex flex-col h-fit">
            <div
                class="bg-[#0B132B] text-white p-4 rounded-t-2xl text-center font-bold tracking-wider uppercase text-sm md:text-base shadow-sm">
                Anggota Kelompok
            </div>

            <div
                class="bg-white p-5 md:p-6 rounded-b-2xl border border-t-0 border-gray-200 shadow-sm flex flex-col gap-3">
                @foreach ($anggota as $member)
                    <div
                        class="w-full p-3 flex items-center gap-4 bg-[#E8F1F2] rounded-xl border border-gray-100 hover:border-[#E49273] hover:shadow-md transition-all duration-300 group">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-[#0B132B] group-hover:bg-[#E49273] text-white flex items-center justify-center shadow-sm transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>

                        <div class="text-sm md:text-base font-bold text-[#0B132B] truncate leading-tight">
                            {{ $member->nama }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
