@extends('components.layoutQuestions')
@section('title', 'Evaluasi' . $project->title . '-ProBase')

@section('content')
    {{-- @livewire('quiz') --}}
    @livewire('quiz', ['project' => $project])
@endsection

@push('scripts')
    @livewireScripts()
@endpush
