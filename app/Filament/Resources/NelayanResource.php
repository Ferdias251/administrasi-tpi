<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NelayanResource\Pages;
use App\Filament\Resources\NelayanResource\RelationManagers;
use App\Models\Nelayan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;

class NelayanResource extends Resource
{
    protected static ?string $model = Nelayan::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Resources';
        
    protected static ?string $navigationLabel = 'Nelayan';

    protected static ?string $pluralModelLabel = 'Nelayan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\FileUpload::make('foto')
                    ->required()->image()->disk('public'),
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('jenis_kelamin')->options([
                    'Laki-Laki' => 'Laki-Laki',
                    'Perempuan' => 'Perempuan',
                ]),
                Forms\Components\TextInput::make('umur')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_perahu')
                    ->required()
                    ->maxLength(255),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->sortable()->searchable(),
                Tables\Columns\ImageColumn::make('foto'),
                Tables\Columns\TextColumn::make('nik'),
                Tables\Columns\TextColumn::make('jenis_kelamin'),
                Tables\Columns\TextColumn::make('umur'),
                Tables\Columns\TextColumn::make('nama_perahu'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListNelayans::route('/'),
            'create' => Pages\CreateNelayan::route('/create'),
            'edit' => Pages\EditNelayan::route('/{record}/edit'),
        ];
    }    
}
