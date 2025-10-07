<x-layoutProject>
    <h1 class="font-bold text-3xl">Upload Progress Proyek {{ $project->title }}</h1>
    <h2 class="font-semibold text-2xl mt-3">Upload File dengan ekstensi JPG, JPEG, PNG, atau PDF</h2>
    @if ($file)
        <div class="mb-8 p-4 border rounded-lg bg-gray-50 mt-5">
            <h3 class="text-lg font-semibold text-gray-800">File yang Sudah Kamu Upload:</h3>
            @php
                $extension = pathinfo($file->path, PATHINFO_EXTENSION);
            @endphp
            <p class="font-semibold text-sm">Nama File: {{ $file->nama_file }}</p>
            @if (in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']))
                <div class="mt-4">
                    <img src="{{ asset('storage/' . $file->path) }}" alt="{{ $file->nama_file }}"
                        class="max-w-md rounded-md shadow-md">
                </div>
            @elseif ($extension === 'pdf')
                <div class="mt-4 border">
                    <embed src="{{ asset('storage/' . $file->path) }}" type="application/pdf" width="100%"
                        height="600px">
                </div>
            @endif
        </div>
        <hr class="my-6">
        <p class="text-sm font-bold text-gray-600 mb-4">Meng-upload file baru akan menggantikan file yang sudah ada.</p>
    @endif

    <form action="{{ route('upload.user', ['project' => $project->slug]) }}" method="POST"
        enctype="multipart/form-data" class="mt-4">
        @csrf
        <div>
            <label for="progress" class="block text-sm font-medium text-gray-700">Pilih File:</label>
            <input type="file" name="progress" id="progress" class="mt-1 block w-full">
        </div>

        <button type="submit" class="mt-6 rounded-md bg-indigo-600 px-4 py-2 text-base font-semibold text-white ...">
            Upload
        </button>
    </form>
    {{-- <div class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-xl">
        <div class="md:flex">
            <div class="w-full p-3">
                <div
                    class="relative h-48 rounded-lg border-2 border-blue-500 bg-gray-50 flex justify-center items-center shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
                    <div class="absolute flex flex-col items-center">
                        <img alt="File Icon" class="mb-3" src="https://img.icons8.com/dusk/64/000000/file.png" />
                        <span class="block text-gray-500 font-semibold">Drag &amp; drop your files here</span>
                        <span class="block text-gray-400 font-normal mt-1">or click to upload</span>
                    </div>
                    <form action="/uploadProgress" method="post" enctype="multipart/form-data">
                        @csrf
                        <input name="progress" class="h-full w-full opacity-0 cursor-pointer" type="file" />
                </div>
                <button
                    class="mt-10 rounded-md bg-indigo-600 px-2 py-2 text-2xl font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    type="submit">Upload</button>
                </form>

            </div>
        </div>
    </div> --}}

</x-layoutProject>
