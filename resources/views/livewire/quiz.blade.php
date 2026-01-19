<div>
    @if ($status == 'instruksi')
        <div
            class="max-w-6xl w-full mx-auto my-6 md:my-10 bg-white rounded-lg border border-gray-300 shadow-sm place-self-center">
            <div class="p-4 border-b border-gray-200">
                <h1 class="text-xl md:text-2xl font-bold text-[#0B132B]">Evaluasi {{ $project->title }}</h1>
            </div>
            <div class="p-6 text-justify">
                <div>
                    <h2 class="text-xl md:text-2xl font-bold text-green-600 mb-2">Kerja bagus!</h2>
                    <p class="text-[#0B132B] leading-relaxed">
                        Progres proyekmu untuk Fase <strong>{{ $project->title }}</strong> telah berhasil diselesaikan.
                    </p>
                </div>
                <hr class="border-gray-200 mb-2 mt-2">
                <div class="mb-3">
                    <h3 class="text-lg md:text-xl font-bold text-[#0B132B] mb-3">Selanjutnya: Evaluasi Fase
                        {{ $project->title }}
                    </h3>
                    <p class="text-[#0B132B] mb-3 leading-relaxed">
                        Kerjakan evaluasi singkat untuk mengukur pemahamanmu, yang terdiri dari:
                    </p>
                    <ul class="list-disc list-inside space-y-1 text-[#0B132B]">
                        <li><strong>Soal Pilihan Ganda:</strong> Menguji pemahamanmu terkait konsep dari
                            {{ $project->title }}.</li>
                        <li><strong>Soal Essay:</strong> Untuk memintamu merefleksikan dan menjelaskan proses serta
                            alasan di balik keputusan desain yang kamu ambil di proyekmu</li>
                    </ul>
                </div>
                <div class="mb-3">
                    <h4 class="text-sm md:text-lg font-bold text-[#0B132B] mb-3">Petunjuk Pengerjaan:</h4>
                    <ul class="list-disc list-inside space-y-2 text-[#0B132B]">
                        <li>Semua pertanyaan dirancang untuk dijawab berdasarkan pengalaman dan hasil kerjamu di proyek
                            fase ini.</li>
                        <li>Tidak ada jawaban yang "salah" untuk soal essay selama kamu bisa memberikan alasan
                            yang logis untuk keputusan desainmu</li>
                        <li>Pastikan kamu sudah siap. Tinjau kembali hasil proyekmu sejenak sebelum menekan tombol
                            "Mulai Evaluasi"</li>
                        <li>Pastikan kamu menyimpan jawaban setiap soal, sehingga nomor soal di navigasi soal bewarna
                            <strong>hijau</strong>.
                        </li>
                        <li> Di akhir jangan lupa kamu menekan <strong>"Akhiri Evaluasi"</strong> untuk menyimpan
                            semua jawabanmu.</li>
                    </ul>
                </div>
                <hr class="border-gray-200 mb-2 mt-2">
                <div class="text-center pt-2">
                    <p class="text-[#0B132B] font-semibold mb-5">
                        Tunjukkan pemahamanmu, bukan hanya hasil kerjamu. <br> Selamat mengerjakan!
                    </p>
                </div>

            </div>
            <div class="p-4 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                <button wire:click="mulaiValidasi"
                    class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-6 rounded shadow transition-colors duration-200">
                    Mulai Evaluasi
                </button>
            </div>
        </div>
    @elseif ($status == 'mulai' && $question)
        <div class="px-4 md:px-0 max-w-7xl mx-auto">
            <h1 class="mt-5 ml-3 mb-5 text-2xl md:text-4xl font-bold text-[#0B132B]">Evaluasi {{ $project->title }}</h1>
            <div class="flex flex-col md:flex-row gap-6 mb-10 mt-8">
                <div class="w-full md:w-1/4 p-4 md:p-6 bg-white rounded-xl border border-gray-300 shadow-sm h-fit">
                    <h1 class="text-xl font-bold text-[#0B132B] mb-2 md:mb-4">Navigasi Soal</h1>

                    <div class="grid grid-cols-5 gap-2 md:gap-3 mt-4 md:mt-5">
                        @foreach ($idQuestions as $idQuestion)
                            @php
                                $buttonClass = 'bg-gray-200 hover:bg-gray-300';
                                if (array_key_exists($idQuestion, $jawaban)) {
                                    $buttonClass = 'bg-green-600 text-white hover:bg-green-700';
                                }
                                if ($loop->index == $QuestionIndex) {
                                    $buttonClass = 'bg-blue-600 text-white ring-2 ring-blue-400';
                                }
                            @endphp
                            <button wire:click="lompatSoal({{ $loop->index }})"
                                class="flex items-center justify-center h-10 md:h-12 border-2 border-[#E49273] rounded-md font-bold text-sm md:text-base transition-colors {{ $buttonClass }}">
                                {{ $loop->iteration }}
                            </button>
                        @endforeach
                    </div>
                </div>
                <div class="w-full md:w-3/4 p-4 md:p-8 bg-white rounded-lg border border-gray-300 shadow-sm">
                    <div class="p-3 md:p-4 bg-[#E49273] rounded-2xl shadow-inner">
                        <h1 class="text-xl md:text-2xl font-bold text-[#0B132B] text-center">Soal
                            {{ $QuestionIndex + 1 }}/{{ $totalPertanyaan }}
                        </h1>
                    </div>
                    <div class="p-4 md:p-6 bg-[#E8F1F2] rounded-md mt-4 mb-4">
                        <p class="text-[#0B132B] text-sm md:text-lg font-semibold mb-4">{{ $question->question }}</p>
                    </div>
                    <div class="mt-4">
                        @if ($question->type === 'multiple')
                            <div class="space-y-3">
                                @foreach ($question->options as $option)
                                    <label for="opsi-{{ $option->id }}"
                                        class="flex items-center ps-4 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 has-[:checked]:bg-blue-50 has-[:checked]:border-blue-400">
                                        <input wire:model="JawabanUser" id="opsi-{{ $option->id }}" type="radio"
                                            value="{{ $option->id }}" name="opsi"
                                            class="w-4 h-4 text-blue-600 bg-[#0B132B] border-gray-300 focus:ring-blue-500">
                                        <span
                                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900">{{ $option->opsi }}</span>
                                    </label>
                                @endforeach
                            </div>
                            {{-- <label for="message" class="block mb-2 text-sm font-medium text-blue-900 mt-3">Tuliskan Alasan
                        Kenapa Kamu Memilih Jawaban Tersebut</label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tuliskan alasanmu disini..."></textarea> --}}
                        @elseif ($question->type === 'essay')
                            <textarea wire:model="JawabanUser" id="message" rows="4"
                                class="block p-2.5 w-full text-sm text-white bg-[#0B132B] rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Tuliskan jawabanmu disini..."></textarea>
                        @endif
                    </div>
                    @if ($QuestionIndex == $totalPertanyaan - 1)
                        <div class="text-right mt-8">
                            <button wire:click="submitJawaban"
                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-8 rounded-lg disabled:bg-gray-400">
                                Simpan Jawaban Terakhir
                            </button>
                        </div>
                    @else
                        <div class="text-right mt-8">
                            <button wire:click="submitJawaban"
                                class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-8 rounded-lg disabled:bg-gray-400">
                                Simpan Jawaban
                            </button>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    @elseif ($status == 'selesai')
        <div class="max-w-2xl w-full bg-white rounded-lg border border-gray-300 shadow-sm place-self-center mt-15">
            <div class="p-4 border-b border-gray-200">
                <h1 class="text-xl md:text-2xl font-bold text-[#0B132B]">Evaluasi {{ $project->title }}</h1>
            </div>
            <div class="p-3 border-b border-gray-200">
                <p class="text-[#0B132B] mb-3 leading-relaxed">
                    Selamat kamu sudah menyelesaikan seluruh soal-soal evaluasi {{ $project->title }}
                </p>
                <p class="text-[#0B132B] mb-3 leading-relaxed">
                    Untuk mengakhiri sesi evaluasi dan mengirimkan seluruh jawaban dari hasil observasi tekan tombol
                    <strong>akhiri evaluasi</strong> dibawah.
                </p>
                @if (!$allAnswered)
                    <div class="mt-4 p-3 bg-red-100 border border-red-300 text-red-700 rounded-md text-sm">
                        <p><strong>Peringatan:</strong> Anda belum menjawab semua soal. Tombol "Akhiri Evaluasi" tidak
                            akan aktif sampai semua nomor di navigasi soal berwarna hijau.</p>
                    </div>
                @endif
            </div>
            <div class="p-4 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                {{-- Kembali --}}
                <button wire:click="kembaliKeSoal"
                    class="bg-gray-600 hover:bg-gray-700 text-lg text-white font-bold py-2 px-6 rounded shadow transition-colors duration-200">
                    Kembali ke Soal
                </button>
                {{-- Akhiri --}}
                <button wire:click="askToSubmitFinal" {{ !$allAnswered ? 'disabled' : '' }}
                    class="bg-red-700 hover:bg-red-900 text-lg text-white font-bold py-2 px-6 rounded shadow transition-colors duration-200 disabled:bg-gray-400 disabled:cursor-not-allowed">
                    Akhiri Evaluasi
                </button>
                {{-- <button wire:click="simpanValidasi"
                    class="bg-red-700 hover:bg-red-900 text-lg text-white font-bold py-2 px-6 rounded shadow transition-colors duration-200">
                    Akhiri Evaluasi
                </button> --}}
            </div>
        </div>
    @else
        <h1>Error</h1>
    @endif
    @if ($konfirmasiSubmit)
        <div class="fixed inset-0 bg-black bg-opacity-60 z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
                <div class="p-6">
                    <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">Konfirmasi Akhiri Evaluasi</h3>
                    <p class="text-gray-600">
                        Apakah kamu yakin ingin menyelesaikan evaluasi ini? Kamu tidak akan bisa kembali lagi setelah
                        menekan <strong>"Ya, Akhiri"</strong>.
                    </p>
                </div>
                <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3 rounded-b-lg">
                    <button wire:click="cancelSubmitFinal"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                        Batal
                    </button>
                    <button wire:click="simpanValidasi"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Ya, Akhiri
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
