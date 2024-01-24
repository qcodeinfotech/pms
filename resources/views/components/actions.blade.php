@if (isset($showUrl))
    <a class="btn btn-primary btn-sm" href="{{ $showUrl }}">
        <i class="fas fa-eye">
        </i>
        View
    </a>
@endif
@if (isset($editUrl))
    <a class="btn btn-info btn-sm" href="{{ $editUrl }}">
        <i class="fas fa-pencil-alt">
        </i>
        Edit
    </a>
@endif
@if (isset($deleteUrl))
    <a class="btn btn-danger btn-sm" href="#"
        onclick="deleteRecord('{{ $deleteUrl }}', '{{ $recordId }}', 'Record')">
        <i class="fas fa-trash">
        </i>
        Delete
    </a>
@endif
