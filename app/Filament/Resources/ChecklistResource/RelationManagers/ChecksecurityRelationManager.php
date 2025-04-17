<?php

namespace App\Filament\Resources\ChecklistResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChecksecurityRelationManager extends RelationManager
{
    protected static string $relationship = 'Checksecurity';

    protected static ?string $title = 'Segurança';

    protected static ?string $navigationLabel = 'Checklist de Segurança'; // Altera o texto no menu
    protected static ?string $modelLabel = 'Checklist de Segurança'; // Para uso singular
    protected static ?string $pluralModelLabel = 'Checklist de Segurança'; // Para uso plural



    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('security_id')
                    ->label('Segurança')
                    ->relationship('security', 'name')
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
                Tables\Columns\TextColumn::make('security.name')
                    ->label('Segurança')
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
