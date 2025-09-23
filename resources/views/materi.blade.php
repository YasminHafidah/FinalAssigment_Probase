<x-layoutModul>
    <x-navbar>
        <span id="timer" class="text-white font-semibold">00:60</span>
    </x-navbar>
    <script>
        let urlTujuan = '{{ url('/materi') }}';
        const durasi = 60;
        const display = document.querySelector('#timer');

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
                    alert('Waktu Anda Habis!');
                    window.location.href = urlTujuan;
                }
            }, 1000); // 1000 milidetik = 1 detik
        }

        // document.addEventListener('DOMContentLoaded', function() {
        //     // 1. Cari elemen iframe Quizizz berdasarkan ID yang kita buat
        //     const quizizzIframe = document.getElementById('quizziz');

        //     if (quizizzIframe) {
        //         // 2. Tunggu sampai iframe itu selesai me-load semua kontennya
        //         quizizzIframe.addEventListener('load', function() {
        //             console.log('Quizizz embed finished loading. Starting timer!'); // Pesan untuk debugging

        //             // 3. Setelah iframe siap, baru kita jalankan logika timer
        //             const durasi = 10; // 2 menit = 120 detik
        //             const display = document.querySelector('#timer');

        //             if (display) {
        //                 startTimer(durasi, display);
        //             } else {
        //                 console.error("Elemen dengan ID 'timer' tidak ditemukan.");
        //             }
        //         });
        //     } else {
        //         console.error("Elemen iframe dengan ID 'quizizz-embed' tidak ditemukan.");
        //     }
        // })
        window.onload = function() {
            startTimer(durasi, display);
        };
    </script>

    <div class="container mx-auto p-4 md:p-8">
        <div class="flex flex-col md:flex-row gap-8">
            <div class="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-sm">
                <h1 class="mb-5 text-2xl font-semibold">{{ $modul->title }}</h1>
                <div class="justify-center">{!! $modul->body !!}</div>
            </div>
            <div class="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-sm">
                <div style="width:100%;display:flex;flex-direction:column;gap:8px;min-height:635px;">
                    <iframe id="quizziz" src={{ $modul->quiz }} title="Entitas - Wayground" style="flex:1;"
                        frameBorder="0" allowfullscreen>
                    </iframe>
                    <a href={{ $modul->quiz }} target="_blank">
                        Explore more at Wayground.
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layoutModul>
