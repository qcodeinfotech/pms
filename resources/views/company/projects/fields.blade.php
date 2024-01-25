@php
    $required = !isset($user) ? 'required' : '';
@endphp
<div class="row">
    <div class="form-group col-6">
        <label>@lang('Name')</label><span class="required">*</span />
        {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="form-group col-6">
        <label>@lang('Assign Users')</label>
        {{ Form::select('users[]', $users, $selectedUsers ?? [], ['class' => 'form-control select2', 'multiple']) }}
    </div>
    <div class="form-group col-12">
        <label>@lang('Description')</label>
        {{ Form::textarea('description', null, ['class' => 'form-control form-control-sm']) }}
    </div>

    <div class="col-sm-12 col-md-7">
        <button class="btn btn-primary">@lang('Save')</button>
        <button class="btn btn-primary">@lang('Cancel')</button>
    </div>
</div>
