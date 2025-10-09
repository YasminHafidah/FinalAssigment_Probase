{{-- <x-layoutProject>
    <h1 class="text-4xl  text-blue-950 font-bold">Validasi</h1>
    <h2 class="text-2xl text-blue-950 font-bold mt-5">{{ $project->title }}</h2>
    @forelse ($materials as $material)
        <div>
            <h2 class="text-xl text-blue-950 font-bold">{{ $material->nama_material }}</h2>
            @forelse ($material->questions as $question)
                <h2 class="flex ps-4 border items-center w-10 h-10 font-bold mt-3">{{ $loop->iteration }}</h2>
                @if ($question->type == 'multiple')
                    <label for="message"
                        class="block mb-2 text-xl font-medium text-blue-900 mt-3">{{ $question->question }}</label>
                    @foreach ($question->options as $option)
                        <div class="flex items-center ps-4 border border-gray-200 rounded-sm dark:border-gray-700">
                            <input id="option_{{ $option->id }}" type="radio" value="{{ $option->id }}"
                                name="answers[{{ $question->id }}]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="option_{{ $option->id }}"
                                class="w-full py-4 ms-2 text-sm font-medium text-blue-900 ">{{ $option->opsi }}</label>
                        </div>
                    @endforeach
                    <label for="message" class="block mb-2 text-sm font-medium text-blue-900 mt-3">Tuliskan Alasan
                        Kenapa Kamu Memilih Jawaban Tersebut</label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tuliskan alasanmu disini..."></textarea>
                @else
                    <label for="message"
                        class="block mb-2 text-xl font-medium text-blue-900 mt-3">{{ $question->question }}</label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tuliskan jawabanmu disini..."></textarea>
                @endif
                {{-- @if ($question->type == 'essay')
                    <label for="message"
                        class="block mb-2 text-sm font-medium text-blue-900">{{ $question->question }}</label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tuliskan jawabanmu disini..."></textarea>
                @endif --}}
{{-- @empty
            @endforelse
        </div>
    @empty
        <h3>Tidak ada material</h3>
    @endforelse --}}

{{-- <a href="#"
        class="rounded-md bg-indigo-600 px-2 py-3 text-xl font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ">
        Lanjut
    </a> --}}


{{-- </x-layoutProject> --}}

@extends('components.layoutQuestions')

@section('content')
    @livewire('quiz')
@endsection

@push('scripts')
    @livewireScripts()
@endpush
