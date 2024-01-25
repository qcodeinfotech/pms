@extends('company.layouts.app')
@section('title')
    @lang('Projects')
@endsection

@push('buttons')
    <a href="{{ route('company.projects.create') }}">
        <button type="button" class="btn btn-primary">@lang('Add Project')</button>
    </a>
@endpush

@push('content')
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                @include('components.flash')
                @livewire('company.projects-table', [])
            </div>
        </div>
    </div>
@endpush
