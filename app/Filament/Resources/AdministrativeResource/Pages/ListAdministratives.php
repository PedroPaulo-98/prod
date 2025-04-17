<?php

namespace App\Filament\Resources\AdministrativeResource\Pages;

use App\Filament\Resources\AdministrativeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdministratives extends ListRecords
{
    protected static string $resource = AdministrativeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
