<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Name')->required()->maxLength(255),
                TextInput::make('email')->label('Email')->email()->required()->maxLength(255),
                TextInput::make('password')->label('Password')->password()->required()->maxLength(255),
                TextInput::make('job')->label('Job')->maxLength(255),
                TextInput::make('phoneNumber')->maxLength(20),
                TextInput::make('address')->label('Address')->maxLength(255),
                TextInput::make('city')->maxLength(255),
                FileUpload::make('image')->label('Profile Image')->image()->directory('users')->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

            ImageColumn::make('image')->label('Image')->circular(),
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('email')->searchable()->sortable(),
            TextColumn::make('job')->sortable(),
            TextColumn::make('phoneNumber')->label('Phone'),
            TextColumn::make('city'),
            TextColumn::make('adress'),
            TextColumn::make('created_at')->label('Created')->dateTime()->sortable(),
                
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
