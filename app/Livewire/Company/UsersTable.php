<?php

namespace App\Livewire\Company;

use App\Livewire\BaseDatatableComponent;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UsersTable extends BaseDatatableComponent
{
    public ?string $defaultSortColumn = 'created_at';
    protected $model = User::class;

    public function columns(): array
    {
        return [
            Column::make("Name", 'name')->format(
                fn ($value, $row, Column $column) => "<img src=$row->img_avatar class='img-thumbnail tbl-img m-1' />" . " " . $value
            )->html()->sortable(),

            Column::make("Email", 'email')->sortable(),

            Column::make("Projects", 'id')->format(
                fn ($value, $row, Column $column) => "<span class='badge badge-warning'>XXX</span>"
            )->html()->sortable(),

            Column::make("Created At", 'created_at')->format(
                fn ($value, $row, Column $column) => Carbon::parse($value)->diffForHumans()
            )->sortable(),

            Column::make("Action", 'id')->format(
                fn ($value, $row, Column $column) => view('components.actions', [
                    'showUrl' => route('company.users.show', $row->id),
                    'editUrl' => route('company.users.edit', $row->id),
                    'deleteUrl' => route('company.users.destroy', $row->id),
                    'recordId' => $row->id,
                ])
            )->html(),
        ];
    }

    public function builder(): Builder
    {
        $query = User::role(User::ROLE_USER)->whereCompanyUserId(Auth::id());

        return $query;
    }
}
