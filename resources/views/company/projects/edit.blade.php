@extends('company.layouts.app')
@section('title')
    @lang('Edit Project')
@endsection

@push('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                @include('components.flash')
                <div class="card">
                    <div class="card-body">
                        {{ Form::model($project, ['url' => route('company.projects.update', [$project->id]), 'method' => 'post']) }}
                        @csrf
                        @include('company.projects.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
