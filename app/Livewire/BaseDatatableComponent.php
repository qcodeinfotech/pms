<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;

/**
 * Class BaseDatatableComponent
 */
class BaseDatatableComponent extends DataTableComponent
{
    public bool $sortingPillsStatus = false;
    public bool $columnSelectStatus = false;

    public string $defaultSortDirection = 'desc';

    public $showButtonOnHeader = false;
    public $buttonComponent = '';

    public array $perPageAccepted = [10, 25, 50];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [];
    }
}
