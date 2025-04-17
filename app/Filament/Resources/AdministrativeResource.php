<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdministrativeResource\Pages;
use App\Filament\Resources\AdministrativeResource\RelationManagers;
use App\Models\Administrative;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdministrativeResource extends Resource
{
    protected static ?string $model = Administrative::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    protected static ?string $navigationLabel = 'Administrativo'; // Altera o texto no menu
    protected static ?string $modelLabel = 'Administrativo'; // Para uso singular
    protected static ?string $pluralModelLabel = 'Administrativo'; // Para uso plural

    protected static ?string $navigationGroup = 'Setores'; 


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->helperText(str('Colocar o **Nome** da área adminitrativa.')->inlineMarkdown()->toHtmlString())
                    ->maxLength(255),
                Forms\Components\TextInput::make('information')
                    ->label('Informação')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('information'),
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
            'index' => Pages\ListAdministratives::route('/'),
            'create' => Pages\CreateAdministrative::route('/create'),
            'edit' => Pages\EditAdministrative::route('/{record}/edit'),
        ];
    }
}
