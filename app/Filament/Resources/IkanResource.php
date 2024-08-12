<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IkanResource\Pages;
use App\Models\Ikan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;

class IkanResource extends Resource
{
    protected static ?string $model = Ikan::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Resources';

    protected static ?string $navigationLabel = 'Ikan';

    protected static ?string $pluralModelLabel = 'Ikan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('nama_ikan')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\FileUpload::make('gambar')
                        ->required()->image()->disk('public'),
                    TextInput::make('warna')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('harga_satuan')
                        ->required()
                        ->numeric()
                        ->step(0.01)
                        ->prefix('Rp')
                        ->maxLength(255),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_ikan')->sortable()->searchable(),
                Tables\Columns\ImageColumn::make('gambar'),
                Tables\Columns\TextColumn::make('warna'),
                Tables\Columns\TextColumn::make('harga_satuan'),
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
            'index' => Pages\ListIkans::route('/'),
            'create' => Pages\CreateIkan::route('/create'),
            'edit' => Pages\EditIkan::route('/{record}/edit'),
        ];
    }
}
