<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Filament\Resources\CarResource\RelationManagers;
use App\Models\Car;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               TextInput::make('carModel')->required(),
               TextInput::make('gasoline')->required(),
               TextInput::make('rental_price_per_day')->numeric()->required(),
               TextInput::make('TypeCar')->required(),
               TextInput::make('Capacity')->numeric()->required(),
               Select::make('steering')
                ->options([
                    'manual' => 'Manual',
                    'automatic' => 'Automatic',
                ])->required(),
               FileUpload::make('image')->image() ->nullable(),

       
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('carModel')->searchable(),
                TextColumn::make('gasoline'),
                TextColumn::make('steering'),
                TextColumn::make('rental_price_per_day'),
                TextColumn::make('TypeCar'),
                TextColumn::make('Capacity'),
                ImageColumn::make('image')
                ->disk('public')
               ->circular()->height(100) ->width(100),
      
   
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
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }
}