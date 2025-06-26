<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('amount')
                ->required()
                ->numeric(),

            DatePicker::make('payment_date')
                ->required(),

            Select::make('paymentMethod')
                ->options([
                    'creditcard' => 'Credit Card',
                    'paypal' => 'PayPal',
                ])
                ->required(),

            Select::make('payment_status')
                ->options([
                    'pending' => 'Pending',
                    'completed' => 'Completed',
                    'failed' => 'Failed',
                ])
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([


                 TextColumn::make('id')->label('ID'),
                 TextColumn::make('booking.id')->label('Booking ID'),
                 TextColumn::make('user.name')->label('User'),
                 TextColumn::make('amount')->money('usd')->sortable(),
                 TextColumn::make('payment_date')->date(),
                BadgeColumn::make('paymentMethod')
                ->label('Payment Method')
                ->colors([
                    'info' => 'creditcard',
                    'success' => 'paypal',
                ])
                ->formatStateUsing(fn ($state) => ucfirst($state)),
                BadgeColumn::make('payment_status')
                ->label('Status')
                ->colors([
                    'danger' => 'failed',
                    'warning' => 'pending',
                    'success' => 'completed',
                ])
                ->formatStateUsing(fn ($state) => ucfirst($state)),
                
     
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
            
        ];
    }
}
