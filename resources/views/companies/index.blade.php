@extends('layouts.app')
@section('title')
    Companies
@endsection

@push('buttons')
    <a href="{{ route('admin.companies.create') }}">
        <button type="button" class="btn btn-primary">@lang('Add Company')</button>
    </a>
@endpush

@push('content')
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                @livewire('companies-table', [])
            </div>
        </div>
    </div>
@endpush
