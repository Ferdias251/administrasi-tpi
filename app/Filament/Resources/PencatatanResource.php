<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PencatatanResource\Pages;
use App\Models\Pencatatan;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables;

class PencatatanResource extends Resource
{
    protected static ?string $model = Pencatatan::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-alt';

    protected static ?string $navigationGroup = 'Administrasi Tpi';

    protected static ?string $navigationLabel = 'Pencatatan';

    protected static ?string $pluralModelLabel = 'Pencatatan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Select::make('nama_nelayan')
                        ->label('Nama Nelayan')
                        ->options(function () {
                            return \App\Models\Nelayan::all()->pluck('nama', 'nama');
                        })
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set) {
                            $set('nik', null);
                            $set('nama_perahu', null);
                        }),

                    Select::make('nik')
                        ->label('Nik')
                        ->options(function (callable $get) {
                            $nama_nelayan = $get('nama_nelayan');
                            if ($nama_nelayan) {
                                return \App\Models\Nelayan::where('nama', $nama_nelayan)->pluck('nik', 'nik');
                            }
                            return [];
                        })
                        ->required()
                        ->reactive(),

                    Select::make('nama_perahu')
                        ->label('Nama Perahu')
                        ->options(function (callable $get) {
                            $nama_nelayan = $get('nama_nelayan');
                            if ($nama_nelayan) {
                                return \App\Models\Nelayan::where('nama', $nama_nelayan)->pluck('nama_perahu', 'nama_perahu');
                            }
                            return [];
                        })
                        ->required()
                        ->reactive(),

                    Select::make('ikan_masuk')
                        ->label('Ikan Masuk')
                        ->options(function () {
                            return \App\Models\Ikan::all()->pluck('nama_ikan', 'id');
                        })
                        ->required(),
                    
                    TextInput::make('jumlah_ikan')
                        ->required()
                        ->numeric()
                        ->maxLength(255),

                    TextInput::make('harga_per_kg')
                        ->required()
                        ->numeric()
                        ->step(0.01)
                        ->prefix('Rp')
                        ->maxLength(255)
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $get, callable $set) {
                            $totalBerat = $get('total_berat') ?? 0;
                            $set('total_pendapatan', $state * $totalBerat);
                        }),

                    TextInput::make('total_berat')
                        ->required()
                        ->numeric()
                        ->step(0.01)
                        ->suffix('Kg')
                        ->maxLength(255)
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $get, callable $set) {
                            $hargaPerKg = $get('harga_per_kg') ?? 0;
                            $set('total_pendapatan', $state * $hargaPerKg);
                        }),

                    TextInput::make('total_pendapatan')
                        ->required()
                        ->numeric()
                        ->step(0.01)
                        ->prefix('Rp')
                        ->maxLength(255)
                        ->disabled(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_nelayan')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nik'),
                Tables\Columns\TextColumn::make('nama_perahu'),
                Tables\Columns\TextColumn::make('ikan_masuk'),
                Tables\Columns\TextColumn::make('jumlah_ikan'),
                Tables\Columns\TextColumn::make('harga_per_kg'),
                Tables\Columns\TextColumn::make('total_berat'),
                Tables\Columns\TextColumn::make('total_pendapatan'),
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
            'index' => Pages\ListPencatatans::route('/'),
            'create' => Pages\CreatePencatatan::route('/create'),
            'edit' => Pages\EditPencatatan::route('/{record}/edit'),
        ];
    }    
}
