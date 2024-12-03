@extends('layout.main')
@section('title', 'Evaluation / Create')
@section('content')
    @push('custom-style')
        @livewireStyles()
    @endpush
    <div class="col-12">
        @livewire('evaluation-create')
    </div>

@endsection

@push('custom-script')
    @livewireScripts()
@endpush
