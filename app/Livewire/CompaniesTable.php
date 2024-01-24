<?php

namespace App\Livewire;

use App\Livewire\BaseDatatableComponent;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CompaniesTable extends BaseDatatableComponent
{
    protected $model = User::class;

    public int $perPage = 10;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Name", 'name')->format(
                fn ($value, $row, Column $column) => "<img src=$row->img_avatar class='img-thumbnail height-50 m-1' />" . " " . $value
            )->html(),

            Column::make("Action", 'id')->format(
                fn ($value, $row, Column $column) => view('components.actions', [
                    'showUrl' => route('admin.companies.show', $row->id),
                    'editUrl' => route('admin.companies.edit', $row->id),
                    'deleteUrl' => route('admin.companies.destroy', $row->id),
                    'recordId' => $row->id,
                ])
            )->html(),
        ];
    }

    public function builder(): Builder
    {
        $query = User::query();

        return $query;
    }
}
