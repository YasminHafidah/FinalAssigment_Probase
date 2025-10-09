<div>
    @if ($status == 'instruksi')
        <div class="max-w-2xl w-full bg-white rounded-lg border border-gray-300 shadow-sm place-self-center mt-15">
            <div class="p-4 border-b border-gray-200">
                <h1 class="text-lg font-semibold text-gray-800">Instruction</h1>
            </div>
            <div class="p-6">
                <p class="text-gray-700 mb-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, commodi alias delectus deserunt
                    nihil neque nulla praesentium quidem eligendi doloribus.
                </p>
                <p class="text-gray-700">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem officiis eius quod
                    consequuntur assumenda, nam magni ipsam aspernatur sunt facere quis pariatur debitis cupiditate,
                    fugiat provident veritatis cumque dolorem neque?
                </p>
            </div>
            <div class="p-4 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                <button wire:click="mulaiValidasi"
                    class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-6 rounded shadow transition-colors duration-200">
                    Start
                </button>
            </div>
        </div>
    @elseif ($status == 'mulai' && $question)
        <div class="flex flex-col md:flex-row gap-8">
            <div class="w-full md:w-1/4 p-6 bg-white rounded-lg border border-gray-300 shadow-sm mt-5 ml-5 mr-5">
                <h1 class="text-lg font-semibold text-gray-800">Navigasi Soal</h1>
                <div class="grid grid-cols-5 gap-3 mt-5">
                    @foreach ($idQuestions as $idQuestion)
                        @php
                            $buttonClass = 'bg-gray-200 hover:bg-gray-300'; // Default (belum dijawab)

                            if (array_key_exists($idQuestion, $jawaban)) {
                                $buttonClass = 'bg-green-600 text-white hover:bg-green-700'; // Sudah dijawab
                            }

                            if ($loop->index == $QuestionIndex) {
                                $buttonClass = 'bg-blue-600 text-white ring-2 ring-blue-400'; // Soal aktif
                            }
                        @endphp
                        <button wire:click="lompatSoal({{ $loop->index }})"
                            class="p-2 h-12 rounded-md text-center font-bold transition-colors {{ $buttonClass }}">
                            {{ $loop->iteration }}
                        </button>
                    @endforeach
                </div>
            </div>
            <div class="w-full md:w-3/4 p-6 bg-white rounded-lg border border-gray-300 shadow-sm mt-5 mr-5 ml-5">
                <div class="p-4 border-b border-gray-200">
                    <h1 class="text-lg font-semibold text-gray-800">Soal {{ $QuestionIndex + 1 }}/{{ $totalPertanyaan }}
                    </h1>
                </div>
                <div class="p-6">
                    <p class="text-gray-700 mb-4">{{ $question->question }}</p>
                    @if ($question->type === 'multiple')
                        @foreach ($question->options as $option)
                            <div class="flex items-center ps-4 border border-gray-200 rounded-sm dark:border-gray-700">
                                <input wire:model="JawabanUser" id="opsi" type="radio"
                                    value="{{ $option->id }}" name="opsi"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="opsi"
                                    class="w-full py-4 ms-2 text-sm font-medium text-gray-900">{{ $option->opsi }}</label>
                            </div>
                        @endforeach
                        {{-- <label for="message" class="block mb-2 text-sm font-medium text-blue-900 mt-3">Tuliskan Alasan
                        Kenapa Kamu Memilih Jawaban Tersebut</label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tuliskan alasanmu disini..."></textarea> --}}
                    @elseif ($question->type === 'essay')
                        <textarea wire:model="JawabanUser" id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Tuliskan jawabanmu disini..."></textarea>
                    @endif
                </div>
                <div class="text-right mt-8">
                    <button wire:click="submitJawaban"
                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-8 rounded-lg disabled:bg-gray-400">
                        Simpan Jawaban
                    </button>
                </div>
            </div>
        </div>
    @elseif ($status == 'selesai')
        <div class="max-w-2xl w-full bg-white rounded-lg border border-gray-300 shadow-sm place-self-center mt-15">
            <div class="p-4 border-b border-gray-200">
                <h1 class="text-lg font-semibold text-gray-800">Validasi Selesai</h1>
            </div>
            <div class="p-3 border-b border-gray-200">
                <p class="text-gray-700 mb-4 place-self-center font-bold">Tunggu Hasil Nilainya ya!</p>
            </div>
            <div class="p-4 bg-gray-50 border-t border-gray-200 rounded-b-lg">
                <button wire:click="simpanValidasi"
                    class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-6 rounded shadow transition-colors duration-200">
                    Progress Project
                </button>
            </div>
        </div>
    @else
        <h1>Error</h1>
    @endif





</div>
