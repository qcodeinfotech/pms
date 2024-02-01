@extends('company.layouts.app')
@section('title')
    @lang('Status')
@endsection

@push('buttons')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#statusModal">Add Status</button>
@endpush

@push('content')
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                @include('components.flash')
                @livewire('company.status-table', [])
            </div>
        </div>
    </div>
@endpush

@push('extra')
    <div class="modal fade" tabindex="-1" role="dialog" id="statusModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Add Status')</h5> <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>

                <div class="modal-body">
                    {{ Form::open(['url' => route('company.status.store'), 'method' => 'post']) }}
                    <div class="form-group">
                        <label>@lang('Name')</label><span class="required">*</span />
                        {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke">
                    <button class="btn btn-primary">@lang('Save')</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="statusEditModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Edit Status')</h5> <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body">
                    {{ Form::open(['id' => 'formStatusUpdate', 'method' => 'post']) }}
                    <div class="form-group">
                        <label>@lang('Name')</label><span class="required">*</span />
                        {{ Form::text('name', null, ['class' => 'form-control', 'required', 'id' => 'editName']) }}
                        {{ Form::hidden('id', null, ['class' => 'form-control', 'required', 'id' => 'statusID']) }}
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke">
                    <button class="btn btn-primary">@lang('Save')</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endpush
@push('js')
    @vite('resources/js/company/status.js')
@endpush
