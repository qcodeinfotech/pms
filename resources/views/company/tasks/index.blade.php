@extends('company.layouts.app')
@section('title')
    @lang('Tasks')
@endsection

@push('buttons')
    <a href="{{ route('company.tasks.create') }}">
        <button type="button" class="btn btn-primary">@lang('Add Task')</button>
    </a>
@endpush

@push('content')
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                @include('components.flash')
                @livewire('company.tasks-table', [])
            </div>
        </div>
    </div>
@endpush
