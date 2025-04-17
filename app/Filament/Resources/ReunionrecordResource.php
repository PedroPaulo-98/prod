<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReunionrecordResource\Pages;
use App\Filament\Resources\ReunionrecordResource\RelationManagers;
use App\Models\Reunionrecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReunionrecordResource extends Resource
{
    protected static ?string $model = Reunionrecord::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';


    protected static ?string $navigationLabel = 'Ata de Reunião'; // Altera o texto no menu
    protected static ?string $modelLabel = 'Ata de Reunião'; // Para uso singular
    protected static ?string $pluralModelLabel = 'Ata de Reunião'; // Para uso plural

    protected static ?string $navigationGroup = 'Reunião'; 


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('mainagenda')
                    ->label('Pauta principal')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('data')
                    ->label('Data')
                    ->required(),
                Forms\Components\TextInput::make('objective')
                    ->label('Objetivo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('location')
                    ->label('Local')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('discussion')
                    ->label('Discussão')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('employee_id')
                    ->label('Chefe')
                    ->relationship('employee', 'name')
                    ->required(),
                Forms\Components\Select::make('unit_id')
                    ->label('Unidade/Diretoria')
                    ->relationship('unit', 'initials')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mainagenda')
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
            RelationManagers\SignaturereunionrecordRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReunionrecords::route('/'),
            'create' => Pages\CreateReunionrecord::route('/create'),
            'edit' => Pages\EditReunionrecord::route('/{record}/edit'),
        ];
    }
}
