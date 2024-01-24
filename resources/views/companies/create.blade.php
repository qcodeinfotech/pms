@extends('layouts.app')
@section('title')
    @lang('Create Company')
@endsection

@push('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                @include('components.flash')
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(['url' => route('admin.companies.store'), 'method' => 'post', 'files' => true]) }}
                        @csrf
                        @include('companies.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
