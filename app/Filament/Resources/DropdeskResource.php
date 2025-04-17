<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DropdeskResource\Pages;
use App\Filament\Resources\DropdeskResource\RelationManagers;
use App\Models\Dropdesk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DropdeskResource extends Resource
{
    protected static ?string $model = Dropdesk::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationGroup = 'Setores'; 


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListDropdesks::route('/'),
            'create' => Pages\CreateDropdesk::route('/create'),
            'edit' => Pages\EditDropdesk::route('/{record}/edit'),
        ];
    }
}
