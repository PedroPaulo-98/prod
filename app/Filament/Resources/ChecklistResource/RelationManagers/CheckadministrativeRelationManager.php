<?php

namespace App\Filament\Resources\ChecklistResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CheckadministrativeRelationManager extends RelationManager
{
    protected static string $relationship = 'Checkadministrative';

    protected static ?string $title = 'Administrativo';

    protected static ?string $navigationLabel = 'Checklist de Administrativo'; // Altera o texto no menu
    protected static ?string $modelLabel = 'Checklist de Administrativo'; // Para uso singular
    protected static ?string $pluralModelLabel = 'Checklist de Administrativo'; // Para uso plural



    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('administrative_id')
                    ->label('Adminitrativo')
                    ->relationship('administrative', 'name')
                    ->required(),
                Forms\Components\Select::make('employee_id')
                    ->label('Responsável')
                    ->relationship('employee', 'name')
                    ->required(),
                Forms\Components\Select::make('platform_id')
                    ->label('Plataforma')
                    ->relationship('platform', 'name')
                    ->required(),
                Forms\Components\TextInput::make('adicionalinformation')
                    ->label('Informações Adicionais')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options([
                        'problema' => 'Problema',
                        'alerta' => 'Alerta',
                        'operacional' => 'Operacional',
                    ])
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('administrative.name')
                    ->label('Adminitrativo')
                    ->sortable(),
                    Tables\Columns\TextColumn::make('status')
                        ->badge()
                        ->color(fn (string $state): string => match ($state) {
                            'problema' => 'danger',
                            'alerta' => 'warning',
                            'operacional' => 'success',
                        }),
                    Tables\Columns\TextColumn::make('adicionalinformation')
                        ->label('Informação Adicional')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('employee.name')
                        ->label('responsável')
                        ->sortable(),
                    Tables\Columns\TextColumn::make('platform.name')
                        ->label('Plataforma')
                        ->sortable(),
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
