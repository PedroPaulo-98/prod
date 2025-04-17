<?php

namespace App\Filament\Resources\ConciergeResource\RelationManagers;

use App\Filament\Forms\Components\CameraInput;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EntryRelationManager extends RelationManager
{
    protected static string $relationship = 'Entry';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Plataforma')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('entryexit')
                    ->label('Entrada ou Saída')
                    ->options([
                        'entrada' => 'Entrada',
                        'saida' => 'Saída',
                    ]),
                \App\Filament\Forms\Components\CameraInput::make('photo')
                    ->label('Foto da Câmera')
                    ->saveAsBase64(),
                Forms\Components\DateTimePicker::make('data')
                    ->label('Data')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('id'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
