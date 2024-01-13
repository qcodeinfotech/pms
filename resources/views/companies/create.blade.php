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
                        <form action="{{ route('admin.companies.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>@lang('Company Name')</label><span class="required">*</span />
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>@lang('Email')</label><span class="required">*</span />
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group col-3">
                                    <label>@lang('Password')</label><span class="required">*</span />
                                    <input type="text" class="form-control" name="password" required>
                                </div>
                                <div class="form-group col-3">
                                    <label>@lang('Password')</label><span class="required">*</span />
                                    <input type="text" class="form-control" name="confirm_password" required>
                                </div>
                                <div class="form-group col-3">
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Change File</label>
                                        <input type="file" name="image" id="image-upload">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">@lang('Save')</button>
                                    <button class="btn btn-primary">@lang('Cancel')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush
