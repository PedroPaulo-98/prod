<?php

namespace App\Filament\Resources\ChecklistResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChecksystemsRelationManager extends RelationManager
{
    protected static string $relationship = 'checksystem';

    protected static ?string $title = 'Sistemas';


    protected static ?string $navigationLabel = 'Checklist de Sistemas'; // Altera o texto no menu
    protected static ?string $modelLabel = 'Checklist de Sistemas'; // Para uso singular
    protected static ?string $pluralModelLabel = 'Checklist de Sistemas'; // Para uso plural


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('system_id')
                    ->label('Sistema')
                    ->relationship('system', 'name')
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
                        'fora' => 'Fora',
                        'instabilidade' => 'Instabilidade',
                        'estavel' => 'Estável',
                    ])
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('system.name')
                    ->label('Sistema')
                    ->sortable(),
                    Tables\Columns\TextColumn::make('status')
                        ->badge()
                        ->color(fn (string $state): string => match ($state) {
                            'fora' => 'danger',
                            'instabilidade' => 'warning',
                            'estavel' => 'success',
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
