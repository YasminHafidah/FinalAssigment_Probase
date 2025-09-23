<x-layoutProject>
    <h1 class="mb-5 text-2xl font-semibold">{{ $project->title }}</h1>
    <div class="justify-content">{!! $project->guidelines !!}</div>
    <br>
    <a href='/uploadProgress'
        class="rounded-md bg-indigo-600 px-2 py-3 text-xl font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ">
        Lanjutkan</a>
</x-layoutProject>
