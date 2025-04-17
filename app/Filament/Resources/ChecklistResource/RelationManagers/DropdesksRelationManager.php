<?php

namespace App\Filament\Resources\ChecklistResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DropdesksRelationManager extends RelationManager

{
    protected static string $relationship = 'dropdesks';

    protected static ?string $title = 'Dropdesk';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('callnumber')
                    ->label('Numero do chamado')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('applicant')
                    ->label('Solicitante')
                    ->required()
                    ->maxLength(100)
                    ->label('Solicitante'),
                Forms\Components\TextInput::make('subject')
                    ->label('Assunto')
                    ->required()
                    ->maxLength(100)
                    ->label('Assunto'),
                Forms\Components\TextInput::make('attendant')
                    ->label('Atendente')
                    ->required()
                    ->maxLength(100)
                    ->label('Atendente'),
                Forms\Components\Select::make('status')
                    ->options([
                        'pendente' => 'Pendente',
                        'em_andamento' => 'Em Andamento',
                        'concluido' => 'Concluído',
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('data')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('callnumber')
            ->columns([
                Tables\Columns\TextColumn::make('callnumber')
                    ->label('Numero do chamado')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('applicant')
                    ->label('Solicitante')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->label('Assunto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('attendant')
                    ->label('Atendente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pendente' => 'danger',
                        'em_andamento' => 'warning',
                        'concluido' => 'success',
                    }),
                Tables\Columns\TextColumn::make('data')
                    ->date()
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
