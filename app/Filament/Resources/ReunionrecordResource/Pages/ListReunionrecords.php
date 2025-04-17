<?php

namespace App\Filament\Resources\ReunionrecordResource\Pages;

use App\Filament\Resources\ReunionrecordResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReunionrecords extends ListRecords
{
    protected static string $resource = ReunionrecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
