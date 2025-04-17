<?php

namespace App\Filament\Resources\ConciergeResource\Pages;

use App\Filament\Resources\ConciergeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConcierges extends ListRecords
{
    protected static string $resource = ConciergeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
