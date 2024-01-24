@extends('layouts.app')
@section('title')
    @lang('Edit Company')
@endsection

@push('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                @include('components.flash')
                <div class="card">
                    <div class="card-body">
                        {{ Form::model($user, ['url' => route('admin.companies.update', [$user->id]), 'method' => 'post', 'files' => true]) }}
                        @csrf
                        @include('companies.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
