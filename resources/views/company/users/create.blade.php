@extends('company.layouts.app')
@section('title')
    @lang('Create User')
@endsection

@push('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                @include('components.flash')
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(['url' => route('company.users.store'), 'method' => 'post', 'files' => true]) }}
                        @csrf
                        @include('company.users.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
