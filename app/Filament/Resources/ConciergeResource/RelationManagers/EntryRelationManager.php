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

    protected static ?string $title = 'Entrada';

    protected static ?string $navigationLabel = 'Entrada'; // Altera o texto no menu
    protected static ?string $modelLabel = 'Entrada'; // Para uso singular
    protected static ?string $pluralModelLabel = 'Entrada'; // Para uso plural


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
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
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Plataforma')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('entryexit')
                    ->label('Tipo')
                    ->formatStateUsing(fn (string $state): string => $state === 'entrada' ? 'Entrada' : 'Saída'),
                    
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Foto')
                    ->height(50)
                    ->circular()
                    ->defaultImageUrl(function ($record) {
                        // Se for base64, retorna diretamente, senão tenta como URL
                        return str_starts_with($record->photo, 'data:image') 
                            ? $record->photo 
                            : url('storage/' . $record->photo);
                    }),
                    
                Tables\Columns\TextColumn::make('data')
                    ->label('Data')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
