<?php

namespace App\Filament\Resources\PencatatanResource\Pages;

use App\Filament\Resources\PencatatanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPencatatans extends ListRecords
{
    protected static string $resource = PencatatanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ButtonAction::make()->url(fn()=> route('download-pdf'))->openUrlInNewTab(),
            Actions\CreateAction::make(),
        ];
    }
}
