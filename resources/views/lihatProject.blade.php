<x-layoutProject>
    @section('title', 'Project ' . $project->title . '-ProBase')
    <h1 class="text-2xl md:text-4xl text-[#0B132B] font-extrabold mb-5">Selamat datang di Checkpoint
        {{ $project->title }}! </h1>
    <div class="mb-6">
        <a href="{{ url('/project') }}"
            class="inline-flex items-center gap-2 text-[#0B132B] hover:text-[#8093F1] font-bold transition-colors group">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 group-hover:-translate-x-1 transition-transform"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Daftar Project
        </a>
    </div>
    @if ($project->id == 1)
        <div
            class="w-full bg-white rounded-xl shadow-lg p-8 text-[#0B132B] font-semibold mb-4 text-justify border-2 border-dashed">
            <h2
                class="text-xl md:text-2xl font-bold uppercase tracking-wider text-[#0B132B] opacity-90 mb-4 flex items-center gap-2 border-b pb-3">
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
    <div class="lkpd-container w-full bg-[#F9F2ED] rounded-xl shadow-lg overflow-hidden">
        <div class="lkpd-wrapper">
            <div class="lkpd-content origin-top-left p-8">
                {!! $project->guidelines !!}
            </div>
        </div>
    </div>
    <br>
    <div class="flex flex-col md:flex-row justify-center items-center gap-4 mt-4">

        <a href="{{ url('/upload/' . $project->slug) }}"
            class="rounded-md bg-[#8093F1] border-[#0B132B] border-2 px-6 py-1 text-lg font-bold text-[#0B132B] shadow-xs hover:bg-[#0B132B] hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#8093F1]">
            Upload Progress {{ $project->title }}
        </a>

        @if ($project->id != 1 && $sudahUpload)
            <a href="{{ url('/validasi/' . $project->slug) }}"
                class="rounded-md bg-[#E49273] border-[#0B132B] border-2 px-6 py-1 text-md md:text-lg font-bold text-[#0B132B] shadow-xs hover:bg-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">
                Evaluasi {{ $project->title }}
            </a>
        @elseif ($project->id != 1 && !$sudahUpload)
            <span
                class="rounded-md bg-gray-300 border-gray-400 border-2 px-6 py-1 text-md md:text-lg font-bold text-gray-500 shadow-xs cursor-not-allowed">
                Validasi Pemahaman {{ $project->title }}
            </span>
        @endif
    </div>
    <style>
        .lkpd-container {
            position: relative;
            width: 100%;
        }

        @media (max-width: 768px) {
            .lkpd-wrapper {
                display: block;
                width: 100%;
                /* Trik Utama: Menghitung tinggi container secara manual agar background tidak panjang */
                /* Kita pakai container query atau aspect ratio jika kontennya statis,
                   tapi untuk konten dinamis kita gunakan cara 'clipping' */
                overflow: hidden;
            }

            .lkpd-content {
                transform: scale(0.65);
                /* Perkecil sedikit lagi agar pas di layar sempit */
                width: 153.8%;
                /* 1 / 0.65 */
                display: block;
            }

            /* Gunakan JS atau manual height adjustment jika background masih memanjang */
            .lkpd-container {
                max-height: 70vh;
                /* Membatasi tinggi di HP agar tidak meluap */
                overflow-y: auto;
                /* Jika konten panjang, bisa di-scroll di dalam kotak krem */
            }
        }

        .lkpd-content * {
            max-width: 100%;
            box-sizing: border-box;
            word-wrap: break-word;
        }
    </style>

    <script>
        // Opsional: Script untuk menyesuaikan tinggi container secara otomatis
        window.addEventListener('resize', adjustLKPDHeight);
        window.addEventListener('load', adjustLKPDHeight);

        function adjustLKPDHeight() {
            if (window.innerWidth <= 768) {
                const content = document.querySelector('.lkpd-content');
                const wrapper = document.querySelector('.lkpd-wrapper');
                if (content && wrapper) {
                    const scaledHeight = content.offsetHeight * 0.65;
                    wrapper.style.height = scaledHeight + 'px';
                }
            } else {
                const wrapper = document.querySelector('.lkpd-wrapper');
                if (wrapper) wrapper.style.height = 'auto';
            }
        }
    </script>
</x-layoutProject>
