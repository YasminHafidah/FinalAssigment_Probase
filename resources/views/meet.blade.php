<x-layoutProject>
    @section('title', 'Meet - ProBase')
    <h1>Meet</h1>
    @if (Auth::user()->userGroup && Auth::user()->userGroup->group && Auth::user()->userGroup->group->meet)
        <a href="{{ route('meet') }}" class="btn btn-primary">Masuk Google Meet</a>
    @else
        <button class="btn btn-secondary" disabled>Link Meet belum tersedia</button>
    @endif

</x-layoutProject>
