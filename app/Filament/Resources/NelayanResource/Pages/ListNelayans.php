<?php

namespace App\Filament\Resources\NelayanResource\Pages;

use App\Filament\Resources\NelayanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNelayans extends ListRecords
{
    protected static string $resource = NelayanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
