@extends('company.layouts.app')
@section('title')
    @lang('Edit Task')
@endsection

@push('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                @include('components.flash')
                <div class="card">
                    <div class="card-body">
                        {{ Form::model($task, ['url' => route('company.tasks.update', [$task->id]), 'method' => 'post', 'files' => true]) }}
                        @csrf
                        @include('company.tasks.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
