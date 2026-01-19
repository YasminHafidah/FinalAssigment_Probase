<x-layoutModul>
    @section('title', 'Materi ' . $modul->title . '-ProBase')
    <div id="tutorial-overlay"
        class="fixed inset-0 flex items-center justify-center p-4 z-[99999] bg-[#0B132B]/20 backdrop-blur-sm transition-opacity duration-500 border-2 border-[#0B132B]">
        <div class="bg-white rounded-2xl p-6 md:p-8 max-w-md w-full transform transition-transform duration-500 scale-100 border-2 border-[#0B132B] shadow-2xl animate-pulse"
            id="tutorial-modal">
            <h2 class="text-2xl font-bold text-[#0B132B] mb-4 flex items-center gap-2">
                <span class="text-3xl">💡</span> Petunjuk Belajar
            </h2>

            <ul class="space-y-4 text-[#0B132B] text-left text-sm md:text-base">
                <li class="flex items-start gap-3">
                    <span
                        class="bg-[#E49273] text-white rounded-full h-6 w-6 flex items-center justify-center shrink-0 text-xs">1</span>
                    <p>Klik <b>ikon atau tombol</b> yang muncul untuk membuka informasi tambahan.</p>
                </li>
                <li class="flex items-start gap-3">
                    <span
                        class="bg-[#E49273] text-white rounded-full h-6 w-6 flex items-center justify-center shrink-0 text-xs">2</span>
                    <p>Jika ada <b>objek yang bergerak</b>, coba klik objek tersebut.</p>
                </li>
                <li class="flex items-start gap-3">
                    <span
                        class="bg-[#E49273] text-white rounded-full h-6 w-6 flex items-center justify-center shrink-0 text-xs">3</span>
                    <p>Gunakan <b>panah navigasi</b> di bagian bawah Genially untuk pindah halaman.</p>
                </li>
                <li class="flex items-start gap-3">
                    <span
                        class="bg-[#E49273] text-white rounded-full h-6 w-6 flex items-center justify-center shrink-0 text-xs mt-1">4</span>
                    <div class="flex flex-col gap-1">
                        <p>Perhatikan <b>timer</b> di navbar. Itu adalah jatah waktu kamu dalam memperlajari materi ini.
                        </p>
                        <div
                            class="text-xs md:text-sm text-[#0B132B] bg-[#E49273]/20 p-3 rounded-lg border-l-4 border-[#E49273]">
                            <p class="font-medium">
                                <b>Manfaatkan waktu sebaik mungkin</b> untuk mempelajari materi & mengerjakan kuis.
                            </p>
                            <p class="mt-1 text-[11px] md:text-xs opacity-90">
                                ⚠️ Waktu akan <b>otomatis berjalan</b> saat kamu klik "Mulai Belajar".
                            </p>
                        </div>
                    </div>
                </li>
                <li class="flex items-start gap-3 lg:hidden">
                    <span
                        class="bg-[#8093F1] text-white rounded-full h-6 w-6 flex items-center justify-center shrink-0 text-xs">📱</span>
                    <p>Jika menggunakan HP, putar HP ke posisi <b>Landscape</b> agar tampilan materi lebih besar.</p>
                </li>
            </ul>

            <div class="mt-8 text-center">
                <p class="text-xs text-[#E49273] font-semibold mb-2 animate-bounce">
                    ⏱️ Timer dimulai saat tombol diklik!
                </p>
                <button onclick="closeTutorial()"
                    class="w-full bg-[#0B132B] text-white font-bold py-3 rounded-xl hover:bg-[#8093F1] transition-all active:scale-95 shadow-lg">
                    Mulai Belajar
                </button>
            </div>
        </div>
    </div>
    <x-navbar :showLinks="false">
        <x-slot name="navContent">
            <span id="timer" class="text-[#0B132B] font-semibold bg-[#E49273] p-2 rounded-md">00:60</span>
        </x-slot>
    </x-navbar>
    {{-- <script>
        let urlTujuan = '{{ url('/materi') }}';
        const durasi = 60;
        const display = document.querySelector('#timer');
        const currentModulSlug = '{{ $modul->slug }}';

        function startTimer(duration, displayElement) {
            let timer = duration,
                minutes, seconds;
            // setInterval akan menjalankan fungsi di dalamnya setiap 1 detik
            let interval = setInterval(function() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                // Tambahkan angka 0 di depan jika angkanya < 10
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                // Tampilkan di elemen HTML
                displayElement.textContent = minutes + ":" + seconds;

                // Kurangi waktu
                timer--;

                // Jika waktu sudah habis
                if (timer < 0) {
                    clearInterval(interval);

                    fetch(`/materi/${currentModulSlug}/selesai`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Success:', data); // Log sukses (opsional)
                            alert('Waktu Anda Habis!'); // Tampilkan alert
                            window.location.href = urlTujuan; // Redirect setelah berhasil
                        })
                        .catch((error) => {
                            console.error('Error:', error); // Log error jika gagal
                            alert('Gagal menyimpan progress. Silakan coba lagi.'); // Beri tahu user jika gagal
                            // Pertimbangkan untuk tidak redirect jika gagal?
                            // window.location.href = urlTujuan;
                        });
                }
            }, 1000); // 1000 milidetik = 1 detik
        }

        window.onload = function() {
            startTimer(durasi, display);
        };
    </script> --}}
    <script>
        let urlTujuan = '{{ url('/materi') }}';
        const durasi = 300;
        const display = document.querySelector('#timer');
        const currentModulSlug = '{{ $modul->slug }}';
        let timerStarted = false;

        function startTimer(duration, displayElement) {
            if (timerStarted) return;
            timerStarted = true;

            let timer = duration,
                minutes, seconds;
            let interval = setInterval(function() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
                displayElement.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clearInterval(interval);
                    kirimProgressSelesai();
                }
            }, 1000);
        }

        function closeTutorial() {
            const overlay = document.getElementById('tutorial-overlay');
            const modal = document.getElementById('tutorial-modal');

            // Efek animasi pop-out (mengecil lalu hilang)
            modal.style.transform = 'scale(0.9)';
            overlay.style.opacity = '0';

            // Timer baru dimulai di sini
            startTimer(durasi, display);

            setTimeout(() => {
                overlay.classList.add('hidden');
                document.body.style.overflow = 'auto'; // Mengaktifkan scroll kembali
            }, 500);
        }

        function kirimProgressSelesai() {
            fetch(`/materi/${currentModulSlug}/selesai`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    alert('Waktu Anda Habis!');
                    window.location.href = urlTujuan;
                });
        }

        window.onload = function() {
            document.body.style.overflow = 'hidden';
        };
    </script>


    <div class="w-full p-4 md:p-8 lg:px-4 xl:px-8">
        <div class="flex flex-col md:flex-row gap-6 items-start">
            <div class="w-full lg:w-3/5 bg-white p-6 rounded-lg shadow-sm">
                <h1 class="mb-5 text-2xl font-semibold text-center bg-[#E49273] text-[#0B132B] p-3 rounded-md">
                    {{ $modul->title }}</h1>
                <div
                    class="w-full aspect-video flex justify-center text-[#0B132B] overflow-hidden rounded-md h-full genially-responsive-wrapper">
                    {!! $modul->body !!}</div>
            </div>
            <div class="w-full md:w-2/5 bg-white p-6 rounded-lg shadow-sm">
                <div style="width:100%;display:flex;flex-direction:column;gap:8px;min-height:950px;">
                    <iframe id="quizziz" src={{ $modul->quiz }} title="Event Energizer" style="flex:1;"
                        frameBorder="0" allowfullscreen>
                    </iframe><a href="{{ $modul->quiz }}" target="_blank">Participate on Wayground</a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <style>
        .animate-pulse {
            animation: pulse 2.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.95;
                transform: scale(1.02);
            }
        }


        /* Efek Berdenyut Menyala pada Tombol */
        #tutorial-overlay {
            z-index: 99999 !important;
            pointer-events: auto;
            /* Memastikan overlay bisa diklik */
        }

        /* Trik agar iframe tidak menembus: saat modal buka, matikan klik pada konten utama */
        body.modal-open .w-full.p-4 {
            pointer-events: none;
            user-select: none;
        }
    </style>
</x-layoutModul>
