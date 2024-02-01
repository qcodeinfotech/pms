@if (isset($showUrl))
    <a class="btn btn-primary btn-sm" href="{{ $showUrl }}">
        <i class="fas fa-eye">
        </i>
        View
    </a>
@endif
@if (isset($editUrl))
    @if (isset($modal))
        <a class="btn btn-info btn-sm edit-btn" data-id="{{ $recordId }}" href="#">
            <i class="fas fa-pencil-alt">
            </i>
            Edit
        </a>
    @else
        <a class="btn btn-info btn-sm edit-btn" data-id="{{ $recordId }}" href="{{ $editUrl }}">
            <i class="fas fa-pencil-alt">
            </i>
            Edit
        </a>
    @endif
@endif
@if (isset($deleteUrl))
    <a class="btn btn-danger btn-sm" href="#" data-id="{{ $recordId }}"
        onclick="deleteRecord('{{ $deleteUrl }}')">
        <i class="fas fa-trash">
        </i>
        Delete
    </a>
@endif
