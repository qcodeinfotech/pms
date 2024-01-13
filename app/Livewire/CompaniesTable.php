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
            Column::make("Name", 'name'),

            // Column::make("Topic", 'topic.title'),

            // Column::make("Actions", 'id')
            //     ->format(
            //         fn ($value, $row, Column $column) => view('common.livewire-tables.actions', [
            //             'recordId' => $row->id,
            //             'showUrl' => route('user.quiz.show', $row->id),
            //             'deleteUrl' => route('user.quiz.destroy', $row->id),
            //         ])
            //     )
        ];
    }

    public function builder(): Builder
    {
        $query = User::query();

        return $query;
    }
}
