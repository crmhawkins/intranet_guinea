<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Client;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class ClientDatatable extends DataTableComponent
{
    protected $model = Client::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "user.name")
                ->sortable()
                ->searchable(),
            Column::make("Email", "user.email")
                ->sortable()
                ->searchable(),
            Column::make("DNI", "dni")
                ->sortable()
                ->searchable(),
            Column::make("Telefono", "phone_number")
                ->sortable(),
            ButtonGroupColumn::make('Acciones')
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('View')
                        ->title(fn($row) => 'Ver')
                        ->location(fn($row) => route('client.show', $row))
                        ->attributes(function($row){
                            return [
                                'class' => 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800'
                            ];
                        }),
                    LinkColumn::make('Edit')
                        ->title(fn($row) => 'Editar')
                        ->location(fn($row) => route('client.edit', $row))
                        ->attributes(function($row){
                            return [
                                // 'target' => '_blank',
                                'class' => 'underline text-blue-500 hover:no-underline'
                            ];
                        }),
                ])
        ];
    }
}
