<?php

namespace App\Filament\Resources\ReunionrecordResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Forms\Components\SignaturePad;

class SignaturereunionrecordRelationManager extends RelationManager
{
    protected static string $relationship = 'Signaturereunionrecord';

    protected static ?string $title = 'Assinatura';

    protected static ?string $navigationLabel = 'Assinatura'; // Altera o texto no menu
    protected static ?string $modelLabel = 'Assinatura'; // Para uso singular
    protected static ?string $pluralModelLabel = 'Assinatura'; // Para uso plural


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Nome do Responsável')
                ->required()
                ->maxLength(100),
                
            Forms\Components\TextInput::make('unit')
                ->label('Unidade/Órgão')
                ->required()
                ->maxLength(100),
                
            Forms\Components\Fieldset::make('Assinatura Digital')
                ->schema([
                    \App\Filament\Forms\Components\SignaturePad::make('signature')
                        ->label('')
                        ->required()
                ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Responsável')
                ->searchable(),
                
            Tables\Columns\TextColumn::make('unit')
                ->label('Unidade/Órgão')
                ->searchable(),
                
            Tables\Columns\ImageColumn::make('signature')
                ->label('Assinatura')
                ->height('50px')
                ->extraImgAttributes(['style' => 'background-color: white;']),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Nova Assinatura'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
