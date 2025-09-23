<x-layoutProject>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-4xl  text-blue-950 font-bold">Selamat datang di Alur Progress Proyek Basis Data silahkan ikuti
            alur berikut</h1>
        <br>
        <div class="flex flex-col space-y-4 mt-10">
            @if ($projects->isEmpty())
                <p>Belum ada project yang tersedia</p>
            @else
                @foreach ($projects as $project)
                    <a href={{ url('/project/' . $project->slug) }}
                        class="rounded-md bg-indigo-600 px-10 py-3 text-lg font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        {{ $project->title }}</a>
                    <a href={{ url('/uploadProgress')}}
                        class="rounded-md bg-indigo-500 px-10 py-1 text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        Upload Progress {{ $project->title }}</a>
                    @if ($project->id!=1)
                        <a href={{ url('/validasiProgress' .$project->id)}}
                        class="rounded-md bg-indigo-400 px-10 py-1 text-sm font-semibold text-white shadow-xs hover:bg-indigo-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">
                        Validasi {{ $project->title }}</a>
                    @endif
                @endforeach
            @endif
            {{-- <a href="/kelompok" class="rounded-md bg-indigo-300 px-10 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Lihat kamu di kelompok berapa</a>
            <a href="/uploadProgress" class="rounded-md bg-indigo-600 px-10 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Pengumpulan Ide</a>
            <a href="/lihatProject" class="rounded-md bg-indigo-400 px-10 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Conceptual Design</a>
            <a href="/uploadProgress" class="rounded-md bg-indigo-600 px-10 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Pengumpulan Conceptual Design</a>
            <a href="/validasiProgress" class="rounded-md bg-indigo-700 px-10 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Validasi Conceptual Design</a>
            <br> --}}
        </div>
    </div>
</x-layoutProject>
