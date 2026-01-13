<x-layoutProject>
    @section('title', 'Project - ProBase')
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-4xl text-[#0B132B] font-extrabold text-center">Selamat datang di Alur Progress Proyek Basis Data!
        </h1>
        <h2 class="text-xl text-[#0B132B] text-center mt-4">silahkan ikuti alur berikut dan jangan lupa untuk
            menyelesaikan setiap checkpoint nya!</h2>
        <br>
        <div class="flex flex-col space-y-4 mt-6">
            @if ($projects->isEmpty())
                <p>Belum ada project yang tersedia</p>
            @else
                @foreach ($projects as $project)
                    @if ($project->project_bisa_akses)
                        <a href={{ url('/project/' . $project->slug) }}
                            class="rounded-md bg-[#E49273] px-10 py-3 text-lg font-extrabold text-[#0B132B] shadow-xs hover:bg-[#8093F1] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8093F1] flex items-center">
                            <svg class="w-8 h-8 flex-shrink-0 mr-4" viewBox="0 0 54 53" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    class="{{ $project->project_selesai ?? false ? 'fill-green-500 stroke-green-600' : 'stroke-[#E8F1F2]' }}"
                                    d="M27.0007 50.25C40.3475 50.25 51.1673 39.6168 51.1673 26.5C51.1673 13.3832 40.3475 2.75 27.0007 2.75C13.6538 2.75 2.83398 13.3832 2.83398 26.5C2.83398 39.6168 13.6538 50.25 27.0007 50.25Z"
                                    stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                @if ($project->project_selesai)
                                    <path d="M16.5 26.5L24.75 34.75L37.5 18.25" stroke="white" stroke-width="4"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                @endif
                            </svg>
                            <span> {{ $project->title }}</span>
                        </a>
                    @else
                        <div
                            class="rounded-md bg-gray-200 px-10 py-3 text-lg font-extrabold text-gray-500 shadow-xs flex items-center cursor-not-allowed opacity-60">

                            {{-- Lingkaran SVG (selalu abu-abu) --}}
                            <svg class="w-8 h-8 flex-shrink-0 mr-4" viewBox="0 0 54 53" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path class="fill-gray-300 stroke-gray-400"
                                    d="M27.0007 50.25C40.3475 50.25 51.1673 39.6168 51.1673 26.5C51.1673 13.3832 40.3475 2.75 27.0007 2.75C13.6538 2.75 2.83398 13.3832 2.83398 26.5C2.83398 39.6168 13.6538 50.25 27.0007 50.25Z"
                                    stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <span> {{ $project->title }}</span>
                        </div>
                    @endif
                    {{-- <a href={{ url('/project/' . $project->slug) }}
                        class="rounded-md bg-[#E49273] px-10 py-3 text-lg font-extrabold text-[#0B132B] shadow-xs hover:bg-[#8093F1] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8093F1] flex items-center">
                        <svg class="w-8 h-8 flex-shrink-0 mr-4" viewBox="0 0 54 53" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                class="{{ $project->is_completed ?? false ? 'stroke-green-500' : 'stroke-[#E8F1F2]' }}"
                                d="M27.0007 50.25C40.3475 50.25 51.1673 39.6168 51.1673 26.5C51.1673 13.3832 40.3475 2.75 27.0007 2.75C13.6538 2.75 2.83398 13.3832 2.83398 26.5C2.83398 39.6168 13.6538 50.25 27.0007 50.25Z"
                                stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span> {{ $project->title }}</span>

                    </a> --}}
                @endforeach
            @endif
        </div>
    </div>
</x-layoutProject>
