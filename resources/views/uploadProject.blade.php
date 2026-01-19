<x-layoutProject>
    @section('title', 'Upload ' . $project->title . '-ProBase')
    <h1 class="text-2xl md:text-4xl text-[#0B132B] font-extrabold mb-5">Upload Checkpoint {{ $project->title }}</h1>
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
    @if ($file)
        <div class="mb-8 p-4 border-2 border-[#0B132B] rounded-lg mt-5">
            <h3 class="text-xl font-extrabold text-[#0B132B]">File yang Sudah Kamu Upload:</h3>
            <br>
            {{-- <div class="mb-8 p-3 border-dashed border-2 rounded-lg mt-5 bg-white">
                @php
                    $extension = pathinfo($file->path, PATHINFO_EXTENSION);
                @endphp
                <div
                    class="font-bold text-sm md:text-lg text-[#0B132B] bg-[#E49273] px-3 py-1 inline-block rounded-xl mb-4 max-w-full truncate">
                    <p>Nama File: {{ $file->nama_file }}</p>
                </div>
                @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                    <div class="mt-4">
                        <img src="{{ asset('storage/' . $file->path) }}" alt="{{ $file->nama_file }}"
                            class="w-full max-w-sm h-auto rounded-md shadow-md object-contain">
                    </div>
                @elseif ($extension === 'pdf')
                    <div class="mt-4 border">
                        <embed src="{{ asset('storage/' . $file->path) }}" type="application/pdf" width="100%"
                            height="600px">
                    </div>
                @endif
            </div> --}}
            <div class="mb-8 p-3 border-dashed border-2 rounded-lg mt-5 bg-white">
                @php
                    $extension = pathinfo($file->path, PATHINFO_EXTENSION);
                @endphp

                <div
                    class="font-bold text-sm md:text-lg text-[#0B132B] bg-[#E49273] px-3 py-1 inline-block rounded-xl mb-4 max-w-full truncate">
                    <p>Nama File: {{ $file->nama_file }}</p>
                </div>

                <div class="md:hidden mt-2">
                    <a href="{{ asset('storage/' . $file->path) }}" target="_blank"
                        class="inline-flex items-center gap-2 bg-[#8093F1] text-[#0B132B] px-3 py-1 rounded-md font-bold text-sm shadow-sm active:scale-95 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        Lihat File yang Diunggah
                    </a>
                </div>

                @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                    <div class="mt-4 hidden md:block">
                        <img src="{{ asset('storage/' . $file->path) }}" alt="{{ $file->nama_file }}"
                            class="w-full max-w-sm h-auto rounded-md shadow-md object-contain">
                    </div>
                @elseif ($extension === 'pdf')
                    <div class="mt-4 border hidden md:block">
                        <embed src="{{ asset('storage/' . $file->path) }}" type="application/pdf" width="100%"
                            height="600px">
                    </div>
                @endif
            </div>
            <h3 class="text-xl font-extrabold text-[#0B132B] mb-3">Catatan:</h3>
            @if ($file->notes)
                <div class="w-full bg-white rounded-xl shadow-lg p-8 text-[#0B132B] font-semibold">{{ $file->notes }}
                </div>
            @else
                <div class="w-full bg-white rounded-xl shadow-lg p-8 text-[#0B132B] font-semibold">Belum ada catatan
                </div>
            @endif
            <hr class="my-3">
            <p class="text-sm font-bold text-red-500">Mengunggah file baru akan menggantikan file yang sudah ada.</p>
            <form action="{{ route('upload.user', ['project' => $project->slug]) }}" method="POST"
                enctype="multipart/form-data" class="mt-2">
                @csrf
                <div class="flex">
                    <div class="rounded-md border-2 px-4 py-2 mr-3 hover:bg-[#0B132B] flex flex-col">
                        <input type="file" name="progress" id="progress" class="hidden" required>
                        <label for="progress" class="cursor-pointer text-[#0B132B]  hover:text-white">
                            <span id="file-name" class="text-base">Klik disini untuk memilih file</span>
                        </label>
                    </div>
                    <button type="submit"
                        class="rounded-md bg-[#8093F1] px-4 py-2 text-lg font-bold text-[#0B132B] border-[#0B132B] cursor-pointer hover:bg-[#E49273]">
                        Update File Ulang
                    </button>
                </div>
            </form>
            <p class="text-sm font-bold text-[#0B132B] mb-4">Upload file berupa PNG, JPG, atau PDF dengan format file
                NamaLengkap_Kelas_{{ $project->title }}!</p>
        </div>

        {{-- Kalau Belum Upload Sama Sekali --}}
    @else
        <h2 class="text-lg font-semibold text-[#E49273]">Upload file progress kalian melalui form dibawah ini. Upload
            file
            berupa PNG, JPG,
            atau PDF dengan format file NamaLengkap_Kelas_{{ $project->title }}</h2>
        <div class="mb-8 p-4 border-2 border-[#0B132B] rounded-lg mt-5">
            <h3 class="text-xl font-extrabold text-[#0B132B]">Upload File</h3>
            <form action="{{ route('upload.user', ['project' => $project->slug]) }}" method="POST"
                enctype="multipart/form-data" class="mt-2">
                @csrf
                <div>
                    <div
                        class="mb-8 p-8 md:p-20 border-dashed border-2 rounded-lg mt-5 bg-white text-gray-400 hover:text-[#0B132B] flex flex-col text-center items-center">
                        <input type="file" name="progress" id="progress" class="hidden" required>
                        <svg xmlns="http://www.w3.org/2000/svg" width="62" height="60" viewBox="0 0 62 60"
                            fill="none" class="items-center">
                            <path
                                d="M54.25 37.5V47.5C54.25 48.8261 53.7057 50.0979 52.7367 51.0355C51.7678 51.9732 50.4536 52.5 49.0833 52.5H12.9167C11.5464 52.5 10.2322 51.9732 9.26328 51.0355C8.29434 50.0979 7.75 48.8261 7.75 47.5V37.5M43.9167 20L31 7.5M31 7.5L18.0833 20M31 7.5V37.5"
                                stroke="#1E1E1E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <label for="progress" class="cursor-pointer">
                            <span id="file-name" class="text-base">Klik disini untuk memilih file</span>
                        </label>
                    </div>
                    <button type="submit"
                        class="w-full rounded-md bg-[#8093F1] px-4 py-2 text-lg font-bold text-[#0B132B] border-[#0B132B] cursor-pointer hover:bg-[#E49273]">
                        Upload File
                    </button>
                </div>
            </form>
        </div>
    @endif


    <script>
        document.getElementById('progress').addEventListener('change', function(event) {
            const fileNameSpan = document.getElementById('file-name');
            if (event.target.files && event.target.files.length > 0) {
                fileNameSpan.textContent = "File dipilih: " + event.target.files[0].name;
                fileNameSpan.classList.remove('hidden');
            }
        });
    </script>

</x-layoutProject>
