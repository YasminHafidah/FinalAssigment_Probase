<x-layoutProject>
    <h1 class="mb-5 text-2xl font-semibold">{{ $project->title }}</h1>
    <div class="justify-content">{!! $project->guidelines !!}</div>
    <br>
    <a href={{ url('/upload/' . $project->slug) }}
        class="rounded-md bg-indigo-500 px-10 py-1 text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
        Upload Progress {{ $project->title }}</a>
    @if ($project->id != 1)
        <a href={{ url('/validasi/' . $project->slug) }}
            class="rounded-md bg-indigo-400 px-10 py-1 ml-150 text-sm font-semibold text-white shadow-xs hover:bg-indigo-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">
            Validasi {{ $project->title }}</a>
    @endif
</x-layoutProject>
