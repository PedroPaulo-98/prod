<?php

namespace App\Filament\Resources\ReunionrecordResource\Pages;

use App\Filament\Resources\ReunionrecordResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReunionrecord extends EditRecord
{
    protected static string $resource = ReunionrecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
