@php
    $required = !isset($user) ? 'required' : '';
@endphp
<div class="row">
    <div class="form-group col-6">
        <label>@lang('Company Name')</label><span class="required">*</span />
        {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="form-group col-6">
        <label>@lang('Email')</label><span class="required">*</span />
        {{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="form-group col-3">
        <label>@lang('Password')</label>
        @if (!isset($user))
            <span class="required">*</span />
        @endif
        {{ Form::password('password', ['class' => 'form-control', $required]) }}
    </div>
    <div class="form-group col-3">
        <label>@lang('Password')</label>
        @if (!isset($user))
            <span class="required">*</span />
        @endif
        {{ Form::password('confirm_password', ['class' => 'form-control', $required]) }}
    </div>
    <div class="form-group col-3">
        <div id="image-preview" class="image-preview"
            @isset($user)
                style="background-image: url('{{ $user->img_avatar }}')"@endisset>
            <label for="image-upload" id="image-label">Change File</label>
            <input type="file" name="image" id="image-upload" accept="image/*">
        </div>
    </div>
    <div class="col-sm-12 col-md-7">
        <button class="btn btn-primary">@lang('Save')</button>
        <button class="btn btn-primary">@lang('Cancel')</button>
    </div>
</div>
