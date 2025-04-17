<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChecklistResource\Pages;
use App\Filament\Resources\ChecklistResource\RelationManagers;
use App\Models\Checklist;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChecklistResource extends Resource
{
    protected static ?string $model = Checklist::class;

    protected static ?string $title = 'Check-List';

    protected static ?string $navigationGroup = 'Checklist'; 


    protected static ?string $navigationLabel = 'Checklist'; // Altera o texto no menu
    protected static ?string $modelLabel = 'Checklist'; // Para uso singular
    protected static ?string $pluralModelLabel = 'Checklist'; // Para uso plural


    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('data')
                    ->label('Data')
                    ->required(),
                Forms\Components\TextInput::make('observation')
                    ->label('Observação')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('additional')
                    ->label('Informações extras')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('data'),
                Tables\Columns\TextColumn::make('observation'),
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
            RelationManagers\CheckinternetsRelationManager::class,
            RelationManagers\CheckinfrastructuresRelationManager::class,
            RelationManagers\ChecksystemsRelationManager::class,
            RelationManagers\CheckadministrativeRelationManager::class,
            RelationManagers\ChecksecurityRelationManager::class,
            RelationManagers\DropdesksRelationManager::class,
            RelationManagers\ChecksectorRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChecklists::route('/'),
            'create' => Pages\CreateChecklist::route('/create'),
            'edit' => Pages\EditChecklist::route('/{record}/edit'),
        ];
    }
}
