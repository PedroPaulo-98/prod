<?php

namespace App\Filament\Resources\DropdeskResource\Pages;

use App\Filament\Resources\DropdeskResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDropdesks extends ListRecords
{
    protected static string $resource = DropdeskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
