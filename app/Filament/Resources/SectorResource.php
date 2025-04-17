<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectorResource\Pages;
use App\Filament\Resources\SectorResource\RelationManagers;
use App\Models\Sector;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SectorResource extends Resource
{
    protected static ?string $model = Sector::class;

    protected static ?string $navigationLabel = 'Núcleo'; // Altera o texto no menu
    protected static ?string $modelLabel = 'Núcleo'; // Para uso singular
    protected static ?string $pluralModelLabel = 'Núcleos'; // Para uso plural

    protected static ?string $navigationGroup = 'PRODAP'; 


    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nome')
                        ->required()
                        ->helperText(str('Colocar o **Nome completo** aqui.')->inlineMarkdown()->toHtmlString())
                        ->maxLength(255),
                    Forms\Components\TextInput::make('initials')
                        ->label('Inicial')
                        ->required()
                        ->helperText(str('Colocar a **Inicial** aqui.')->inlineMarkdown()->toHtmlString())
                        ->maxLength(255),
                    Forms\Components\TextInput::make('fuction')
                        ->label('Função')
                        ->required()
                        ->helperText(str('Colocar a **Função** aqui.')->inlineMarkdown()->toHtmlString())
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
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('initials')
                    ->label('Inicial'),
                Tables\Columns\TextColumn::make('employee.name')
                    ->label('Responsável')
                    ->sortable(),
                Tables\Columns\TextColumn::make('unit.initials')
                    ->label('Unidade/Diretoria')
                    ->sortable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSectors::route('/'),
            'create' => Pages\CreateSector::route('/create'),
            'edit' => Pages\EditSector::route('/{record}/edit'),
        ];
    }
}
