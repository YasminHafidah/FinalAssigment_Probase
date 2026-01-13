<x-layoutModul>
    @section('title', 'Materi ' . $modul->title . '-ProBase')
    <x-navbar :showLinks="false">
        <x-slot name="navContent">
            <span id="timer" class="text-[#0B132B] font-semibold bg-[#E49273] p-2 rounded-md">00:60</span>
        </x-slot>
    </x-navbar>
    <script>
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
    </script>

    <div class="w-full p-4 md:p-8 lg:px-4 xl:px-8">
        <div class="flex flex-col md:flex-row gap-6 items-start">
            <div class="w-full lg:w-3/5 bg-white p-6 rounded-lg shadow-sm">
                <h1 class="mb-5 text-2xl font-semibold text-center bg-[#E49273] text-[#0B132B] p-3 rounded-md">
                    {{ $modul->title }}</h1>
                <div class="w-full aspect-video flex justify-center text-[#0B132B] overflow-hidden rounded-md h-full">
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
</x-layoutModul>
