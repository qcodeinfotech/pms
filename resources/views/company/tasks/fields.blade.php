<div class="row">
    <div class="form-group col-6">
        <label>@lang('Title')</label><span class="required">*</span />
        {{ Form::text('title', null, ['class' => 'form-control', 'required']) }}
    </div>
    <div class="form-group col-6">
        <label>@lang('Status')</label><span class="required">*</span />
        {{ Form::select('status_id', $status, null, ['class' => 'form-select select2', 'required', 'placeholder' => 'Select Status']) }}
    </div>

    <div class="form-group col-6">
        <label>@lang('Project')</label><span class="required">*</span />
        {{ Form::select('project_id', $project, null, ['class' => 'form-control select2', 'required', 'placeholder' => 'Select Project']) }}
    </div>

    <div class="form-group col-6">
        <label>@lang('Due Date')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-calendar"></i>
                </div>
            </div>
            {{ Form::text('due_date', null, ['class' => 'form-control flatpicker']) }}
        </div>
    </div>

    <div class="form-group col-12">
        <label>@lang('Assigned Users')</label>
        {{ Form::select('users[]', $users, $selectedUsers, ['class' => 'form-control select2', 'placeholder' => 'Select Users', 'multiple']) }}
    </div>

    <div class="form-group col-12">
        <label>@lang('Task Description')</label>
        {{ Form::textarea('description', null, ['class' => 'form-control form-control-sm', 'cols' => 10, 'rows' => 15]) }}
    </div>

    <div class="col-sm-12 col-md-7">
        <button class="btn btn-primary">@lang('Save')</button>
        <a href="{{ route('company.tasks.index') }}" class="btn btn-primary">@lang('Cancel')</a>
    </div>
</div>
