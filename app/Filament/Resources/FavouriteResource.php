<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FavouriteResource\Pages;
use App\Filament\Resources\FavouriteResource\RelationManagers;
use App\Models\Favourite;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FavouriteResource extends Resource
{
    protected static ?string $model = Favourite::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';

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
                    TextColumn::make('user.name')->label('User'),
                    TextColumn::make('car.carModel')->label('Car'),
                    TextColumn::make('created_at')->label('Added At')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
              
            ])
            ->bulkActions([
                
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
            'index' => Pages\ListFavourites::route('/'),
            'create' => Pages\CreateFavourite::route('/create'),
            'edit' => Pages\EditFavourite::route('/{record}/edit'),
        ];
    }
}
