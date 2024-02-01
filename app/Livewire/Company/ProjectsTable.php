<?php

namespace App\Livewire\Company;

use App\Livewire\BaseDatatableComponent;
use App\Models\Project;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ProjectsTable extends BaseDatatableComponent
{
    public ?string $defaultSortColumn = 'created_at';

    public function columns(): array
    {
        return [
            Column::make("Name", 'name')->format(
                fn ($value, $row, Column $column) => $value
            )->sortable(),

            Column::make("Users", 'id')->format(
                fn ($value, $row, Column $column) => "<span class='badge badge-secondary'>$row->users_count</span>"
            )->html()->sortable(),

            Column::make("Created At", 'created_at')->format(
                fn ($value, $row, Column $column) => Carbon::parse($value)->diffForHumans()
            )->sortable(),

            Column::make("Action", 'id')->format(
                fn ($value, $row, Column $column) => view('components.actions', [
                    'showUrl' => route('company.projects.show', $row->id),
                    'editUrl' => route('company.projects.edit', $row->id),
                    'deleteUrl' => route('company.projects.destroy', $row->id),
                    'recordId' => $row->id,
                ])
            )->html(),
        ];
    }

    public function builder(): Builder
    {
        $query = Project::whereUserId(Auth::id())->withCount('users');

        return $query;
    }
}
