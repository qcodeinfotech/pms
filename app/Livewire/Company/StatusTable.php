<?php

namespace App\Livewire\Company;

use App\Livewire\BaseDatatableComponent;
use App\Models\Status;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\Views\Column;

class StatusTable extends BaseDatatableComponent
{
    protected $model = Status::class;

    public function configure(): void
    {
        parent::configure();
        $this->setThAttributes(function (Column $column) {
            if ($column->isField('name')) {
                return [
                    'class' => 'w-75',
                ];
            }

            return ['default' => true];
        });

        $this->setDefaultSort('created_at', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make("Name", 'name')->format(
                fn ($value, $row, Column $column) => $value
            )->html()->sortable(),

            Column::make("Action", 'id')->format(
                fn ($value, $row, Column $column) => view('components.actions', [
                    'modal' => true,
                    // 'showUrl' => route('company.status.show', $row->id),
                    'editUrl' => route('company.status.edit', $row->id),
                    'deleteUrl' => route('company.status.destroy', $row->id),
                    'recordId' => $row->id,
                ])
            )->html(),
        ];
    }

    public function builder(): Builder
    {
        $query = Status::whereUserId(Auth::id());

        return $query;
    }
}
