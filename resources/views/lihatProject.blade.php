<x-layoutProject>
    @section('title', 'Project ' . $project->title . '-ProBase')
    <h1 class="text-4xl text-[#0B132B] font-extrabold mb-5">Selamat datang di Checkpoint {{ $project->title }}! </h1>
    <div class="w-full bg-white rounded-xl shadow-lg p-8 text-[#0B132B] font-semibold">{!! $project->guidelines !!}</div>
    <br>
    <div class="flex flex-col md:flex-row justify-center items-center gap-4 mt-4">

        <a href="{{ url('/upload/' . $project->slug) }}"
            class="rounded-md bg-[#8093F1] border-[#0B132B] border-2 px-6 py-1 text-lg font-bold text-[#0B132B] shadow-xs hover:bg-[#0B132B] hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8093F1]">
            Upload Progress {{ $project->title }}
        </a>

        @if ($project->id != 1 && $sudahUpload)
            <a href="{{ url('/validasi/' . $project->slug) }}"
                class="rounded-md bg-[#E49273] border-[#0B132B] border-2 px-6 py-1 text-lg font-bold text-[#0B132B] shadow-xs hover:bg-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">
                Evaluasi {{ $project->title }}
            </a>
        @elseif ($project->id != 1 && !$sudahUpload)
            <span
                class="rounded-md bg-gray-300 border-gray-400 border-2 px-6 py-1 text-lg font-bold text-gray-500 shadow-xs cursor-not-allowed">
                Validasi {{ $project->title }}
            </span>
        @endif
    </div>
</x-layoutProject>
