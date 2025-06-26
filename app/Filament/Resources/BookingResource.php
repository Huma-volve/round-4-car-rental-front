<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')->relationship('user', 'name')->required()->searchable(),
                Select::make('car_id')->relationship('car', 'carModel')->required()->searchable(),
                TextInput::make('pickup_location')->required(),
                DatePicker::make('pickup_date')->required(),
                TimePicker::make('pick_up_time')->required(),
                TextInput::make('dropoff_location')->required(),
                DatePicker::make('dropoff_date')->required(),
                TimePicker::make('dropoff_time')->required(),
                TextInput::make('price')->numeric()->required(),
               Select::make('status')
               ->options([
                'pending' => 'Pending',
                'approved' => 'Approved',
                'rejected' => 'Rejected',
                'completed' => 'Completed',
               ])->required(),

      
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                    TextColumn::make('user.name')->label('User')->searchable(),
                    TextColumn::make('car.carModel')->label('Car')->searchable(),
                    TextColumn::make('pickup_location'),
                    TextColumn::make('pickup_date')->date(),
                    TextColumn::make('dropoff_date')->date(),
                    TextColumn::make('price')->money('USD'),
                    TextColumn::make('status')->badge()->color(fn ($state) => match ($state) {
                   'pending' => 'gray',
                   'approved' => 'success',
                   'rejected' => 'danger',
                   'completed' => 'info',
                  }),
      
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
