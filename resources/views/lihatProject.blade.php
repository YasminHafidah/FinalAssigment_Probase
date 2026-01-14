<x-layoutProject>
    @section('title', 'Project ' . $project->title . '-ProBase')
    <h1 class="text-4xl text-[#0B132B] font-extrabold mb-5">Selamat datang di Checkpoint {{ $project->title }}! </h1>
    @if ($project->id == 1)
        <div
            class="w-full bg-white rounded-xl shadow-lg p-8 text-[#0B132B] font-semibold mb-4 text-justify border-2 border-dashed">
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
            {!! $question !!}
        </div>
    @endif
    <div class="w-full bg-[#F9F2ED] rounded-xl shadow-lg p-8 text-[#0B132B] font-semibold">{!! $project->guidelines !!}</div>
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
