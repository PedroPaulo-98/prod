<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SecurityResource\Pages;
use App\Filament\Resources\SecurityResource\RelationManagers;
use App\Models\Security;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SecurityResource extends Resource
{
    protected static ?string $model = Security::class;

    protected static ?string $navigationLabel = 'Segurança'; // Altera o texto no menu
    protected static ?string $modelLabel = 'Segurança'; // Para uso singular
    protected static ?string $pluralModelLabel = 'Seguranças'; // Para uso plural

    protected static ?string $navigationGroup = 'Setores'; 



    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->helperText(str('Colocar o **Nome** da área de segurança.')->inlineMarkdown()->toHtmlString())
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSecurities::route('/'),
            'create' => Pages\CreateSecurity::route('/create'),
            'edit' => Pages\EditSecurity::route('/{record}/edit'),
        ];
    }
}
