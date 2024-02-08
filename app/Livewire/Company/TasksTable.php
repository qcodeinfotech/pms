<?php

namespace App\Livewire\Company;

use App\Livewire\BaseDatatableComponent;
use App\Models\Task;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\Views\Column;

class TasksTable extends BaseDatatableComponent
{
    public ?string $defaultSortColumn = 'created_at';
    protected $model = Task::class;

    public function columns(): array
    {
        return [
            Column::make("Title", 'title')->searchable()->sortable(),

            Column::make("Created At", 'created_at')->format(
                fn ($value, $row, Column $column) => Carbon::parse($value)->diffForHumans()
            )->sortable(),

            Column::make("Action", 'id')->format(
                fn ($value, $row, Column $column) => view('components.actions', [
                    'showUrl' => route('company.tasks.show', $row->id),
                    'editUrl' => route('company.tasks.edit', $row->id),
                    'deleteUrl' => route('company.tasks.destroy', $row->id),
                    'recordId' => $row->id,
                ])
            )->html(),
        ];
    }

    public function builder(): Builder
    {
        $query = Task::query();

        if (Auth::user()->hasRole(User::ROLE_COMPANY)) {
            $query->whereUserId(Auth::id());
        } else {
            
        }

        return $query;
    }
}
