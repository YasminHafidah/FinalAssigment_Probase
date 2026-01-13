<x-layout>
    @section('title', 'Kelompok - ProBase')
    <div class="items-center mb-6 text-center">
        <h1
            class="text-4xl font-extrabold tracking-normal leading-normal text-balance text-[#0B132B] bg-[#E49273] px-30 py-2 rounded-2xl">
            {{ $namaKelompok }}
        </h1>
    </div>
    @foreach ($anggota as $anggota)
        <div class="mt-5 gap-y-6 items-center">
            <div
                class="w-full p-3 text-lg text-[#0B132B] placeholder-gray-500 border-[#0B132B] border-2 focus:ring-0 rounded-3xl bg-[#E8F1F2] shadow-lg flex items-center justify-between">
                <span>{{ $anggota->nama }}</span>
            </div>
        </div>
    @endforeach


    {{-- <h1 class="text-4xl  text-blue-950 font-bold">Berikut Daftar Kelompok untuk Pembelajaran Sistem Basis Data</h1>
    <div class="container mt-10 justify-center">
        <iframe width="100%" height="400"
            src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQV94gqpeqALApv-ytwo6vr_QFqgomSfNImuOdWiBuC9UJIMtenwFm5IDsbLNNQ6yr9CyImUyB9UkC5/pubhtml?gid=0&amp;single=true&amp;widget=true&amp;headers=false">
        </iframe>
    </div>
    <div class="mt-10">
        <a href="/project" class="rounded-md bg-blue-900 px-10 py-2 text-white">Lihat Progress Project</a>
    </div> --}}
</x-layout>
