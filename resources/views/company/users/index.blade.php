@extends('company.layouts.app')
@section('title')
    @lang('Users')
@endsection

@push('buttons')
    <a href="{{ route('company.users.create') }}">
        <button type="button" class="btn btn-primary">@lang('Add User')</button>
    </a>
@endpush

@push('content')
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                @include('components.flash')
                @livewire('company.users-table', [])
            </div>
        </div>
    </div>
@endpush
