<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnitResource\Pages;
use App\Filament\Resources\UnitResource\RelationManagers;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnitResource extends Resource
{
    protected static ?string $model = Unit::class;

    protected static ?string $navigationLabel = 'Unidade/Diretoria'; // Altera o texto no menu
    protected static ?string $modelLabel = 'Unidade/Diretoria'; // Para uso singular
    protected static ?string $pluralModelLabel = 'Unidades/Diretorias'; // Para uso plural

    protected static ?string $navigationGroup = 'PRODAP'; 


    protected static ?string $navigationIcon = 'heroicon-o-user-group';

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
                    ->label('Chefe')
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
            'index' => Pages\ListUnits::route('/'),
            'create' => Pages\CreateUnit::route('/create'),
            'edit' => Pages\EditUnit::route('/{record}/edit'),
        ];
    }
}
