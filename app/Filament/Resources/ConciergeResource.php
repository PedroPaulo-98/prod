<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConciergeResource\Pages;
use App\Filament\Resources\ConciergeResource\RelationManagers;
use App\Models\Concierge;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConciergeResource extends Resource
{
    protected static ?string $model = Concierge::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('unit')
                    ->label('Unidade/secretaria/população')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('objective')
                    ->label('Objetivo da entrada')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('data')
                    ->label('Data')
                    ->required(),
                Forms\Components\Select::make('employee_id')
                    ->label('Responsável da entrada')
                    ->relationship('employee', 'name')
                    ->required(),
                Forms\Components\Select::make('unit_id')
                    ->label('Unidade responsável')
                    ->relationship('unit', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit')
                    ->label('Secretaria')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\EntryRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConcierges::route('/'),
            'create' => Pages\CreateConcierge::route('/create'),
            'edit' => Pages\EditConcierge::route('/{record}/edit'),
        ];
    }
}
