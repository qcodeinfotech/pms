@extends('company.layouts.app')
@section('title')
    @lang('Create User')
@endsection

@push('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="d-flex justify-content-between align-items-end mb-3">
                    <h4>Add Admin</h4>
                </div>
                @include('components.flash')
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(['url' => route('company.tasks.store'), 'method' => 'post', 'files' => true]) }}
                        @csrf
                        @include('company.tasks.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
