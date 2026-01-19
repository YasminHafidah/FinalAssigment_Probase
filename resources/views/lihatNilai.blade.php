<x-layout>
    @section('title', 'Hasil Belajar - ProBase')
    <script>
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
        }
    </script>

    <div class="justify-between items-center mb-6">
        <h1 class="text-2xl md:text-4xl font-extrabold tracking-normal leading-normal text-balance text-[#0B132B]">
            Hasil Belajar Siswa
        </h1>
        <h2 class="text-lg md:text-xl font-extrabold tracking-normal leading-normal text-balance text-[#c60d0d]">
            Nilai yang ditampilkan merupakan nilai terbesar pada saat kalian submit
        </h2>
        <br>
        <div class="flex flex-col gap-4">
            @foreach ($laporan as $data)
                @if ($data['id'] == 1)
                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300 mb-2">
                        <div class="p-6">
                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                                {{-- BAGIAN 1: Judul Project (Kiri) --}}
                                <div class="lg:col-span-3">
                                    <h3 class="text-xl font-bold text-[#0B132B] mb-1">
                                        {{ $data['project_title'] }}
                                    </h3>
                                </div>
                                <div class="lg:col-span-5">
                                    <div class="grid gap-4 h-full">
                                        {{-- Kotak Project --}}
                                        <div
                                            class="bg-indigo-50 border border-indigo-100 rounded-lg p-4 flex flex-col justify-center items-center h-full min-h-[100px]">
                                            <span
                                                class="text-[10px] uppercase font-bold text-indigo-400 tracking-wider text-center mb-1">
                                                Nilai Hasil Project
                                            </span>
                                            <span class="text-3xl font-extrabold text-indigo-600">
                                                {{ $data['nilai_project'] }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lg:col-span-4 border-l border-gray-100 pl-0 lg:pl-6">
                                    <div class="flex flex-col justify-between h-full">
                                        <div class="mb-4">
                                            <p class="text-xs font-bold text-gray-400 uppercase mb-1">Feedback Project
                                            </p>
                                            <div
                                                class="text-sm text-gray-600 italic bg-gray-50 p-3 rounded border border-gray-100">
                                                {{ $data['feedback_project'] ?? 'Belum ada feedback.' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($data['id'] > 1)
                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-300 mb-3">
                        <div class="p-6">
                            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                                {{-- BAGIAN 1: Judul Project (Kiri) --}}
                                <div class="lg:col-span-3">
                                    <h3 class="text-xl font-bold text-[#0B132B] mb-1">
                                        {{ $data['project_title'] }}
                                    </h3>
                                    <p class="text-xs text-gray-400 mb-3">
                                        Status:
                                        <span
                                            class="{{ $data['status'] == 'Selesai' ? 'text-green-600 font-bold' : 'text-gray-500' }}">
                                            {{ $data['status'] }}
                                        </span>
                                    </p>

                                    {{-- Tombol Riwayat --}}
                                    <button onclick="toggleModal('modal-{{ $data['id'] }}')"
                                        class="text-sm bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 px-4 rounded-lg flex items-center gap-2 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Lihat Riwayat
                                    </button>
                                </div>

                                {{-- BAGIAN 2: Skor Nilai (Tengah) --}}
                                <div class="lg:col-span-5">
                                    <div class="grid grid-cols-3 gap-4 h-full">

                                        {{-- Kotak Project --}}
                                        <div
                                            class="bg-indigo-50 border border-indigo-100 rounded-lg p-4 flex flex-col justify-center items-center h-full min-h-[100px]">
                                            <span
                                                class="text-[10px] uppercase font-bold text-indigo-400 tracking-wider text-center mb-1">
                                                Nilai Hasil Project
                                            </span>
                                            <span class="text-3xl font-extrabold text-indigo-600">
                                                {{ $data['nilai_project'] }}
                                            </span>
                                        </div>

                                        {{-- Kotak PG --}}
                                        <div
                                            class="bg-blue-50 border border-blue-100 rounded-lg p-4 flex flex-col justify-center items-center h-full min-h-[100px]">
                                            <span
                                                class="text-[10px] uppercase font-bold text-blue-400 tracking-wider text-center mb-1">
                                                Nilai PG
                                            </span>
                                            <span class="text-3xl font-extrabold text-blue-600">
                                                {{ $data['best']['nilai_pg'] }}
                                            </span>
                                        </div>

                                        {{-- Kotak Essay --}}

                                        <div
                                            class="bg-indigo-50 border border-indigo-100 rounded-lg p-4 flex flex-col justify-center items-center h-full min-h-[100px]">
                                            <span
                                                class="text-[10px] uppercase font-bold text-indigo-400 tracking-wider text-center mb-1">
                                                Nilai Essay
                                            </span>
                                            <span class="text-3xl font-extrabold text-indigo-600">
                                                {{ $data['best']['nilai_essay'] }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                {{-- BAGIAN 3: Feedback --}}
                                <div class="lg:col-span-4 border-l border-gray-100 pl-0 lg:pl-6">
                                    <div class="flex flex-col justify-between h-full">
                                        <div class="mb-4">
                                            <p class="text-xs font-bold text-gray-400 uppercase mb-1">Feedback Project
                                            </p>
                                            <div
                                                class="text-sm text-gray-600 italic bg-gray-50 p-3 rounded border border-gray-100 max-h-32 overflow-y-auto break-words">
                                                {{ $data['feedback_project'] ?? 'Belum ada feedback.' }}
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <p class="text-xs font-bold text-gray-400 uppercase mb-1">Feedback Jawaban
                                                Essay</p>
                                            <div
                                                class="text-sm text-gray-600 italic bg-gray-50 p-3 rounded border border-gray-100 max-h-32 overflow-y-auto break-words">
                                                {{ $data['best']['feedback'] ?? 'Belum ada feedback.' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
        </div>

        {{-- Riwayat --}}
        <div class="hidden fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center bg-gray-900/60 backdrop-blur-md p-4"
            id="modal-{{ $data['id'] }}">

            <div class="relative w-full max-w-2xl mx-auto my-auto">

                {{-- Content --}}
                <div
                    class="border-2 border-[#0B132B] rounded-2xl shadow-2xl relative flex flex-col w-full bg-white outline-none focus:outline-none max-h-[90vh] ">

                    {{-- Header --}}
                    <div class="flex items-center justify-between p-5 border-b border-solid border-slate-100">
                        <h3 class="text-lg md:text-2xl font-bold text-[#0B132B] leading-tight">
                            Riwayat: {{ $data['project_title'] }}
                        </h3>
                        <button onclick="toggleModal('modal-{{ $data['id'] }}')" type="button"
                            class="p-2 ml-auto text-gray-400 hover:text-gray-900 transition-colors">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    {{-- Body (Scrollable) --}}
                    <div class="relative p-6 flex-auto overflow-y-auto">
                        @if (count($data['riwayat']) > 0)
                            <div class="overflow-x-auto rounded-lg border border-gray-100 max-h-60 overflow-y-auto">
                                <table class="w-full text-sm text-left text-gray-500">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                        <tr>
                                            <th class="px-4 py-3 whitespace-nowrap">Tanggal</th>
                                            <th class="px-4 py-3 text-center">PG</th>
                                            <th class="px-4 py-3 text-center">Essay</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['riwayat'] as $item)
                                            <tr class="bg-white border-b hover:bg-gray-50 transition-colors">
                                                <td class="px-4 py-4 text-xs md:text-sm">{{ $item['date'] }}</td>
                                                <td class="px-4 py-4 text-center font-bold text-blue-600">
                                                    {{ $item['nilai_pg'] }}</td>
                                                <td class="px-4 py-4 text-center font-bold text-indigo-600">
                                                    {{ $item['nilai_essay'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- Bagian Feedback --}}
                            <div class="mt-6">
                                <p
                                    class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-orange-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                        </path>
                                    </svg>
                                    Feedback Jawaban Essay
                                </p>
                                <div
                                    class="bg-orange-50/50 rounded-xl p-4 text-sm text-gray-700 italic border border-orange-100 max-h-40 overflow-y-auto break-words">
                                    @if (!empty($data['best']['feedback']) && $data['best']['feedback'] !== 'Belum ada feedback.')
                                        "{{ $data['best']['feedback'] }}"
                                    @else
                                        <span class="text-gray-400">Belum ada feedback </span>
                                    @endif
                                </div>
                            </div><div class="mt-6">
                                <p
                                    class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-orange-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                        </path>
                                    </svg>
                                    Feedback Jawaban Essay
                                </p>
                                <div
                                    class="bg-orange-50/50 rounded-xl p-4 text-sm text-gray-700 italic border border-orange-100 max-h-40 overflow-y-auto break-words">
                                    @if (!empty($data['best']['feedback']) && $data['best']['feedback'] !== 'Belum ada feedback.')
                                        "{{ $data['best']['feedback'] }}"
                                    @else
                                        <span class="text-gray-400">Belum ada feedback </span>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="text-center py-10">
                                <p class="text-gray-400">Belum ada riwayat pengerjaan.</p>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    </div>
</x-layout>
