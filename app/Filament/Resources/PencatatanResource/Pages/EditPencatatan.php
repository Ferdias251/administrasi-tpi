<?php

namespace App\Filament\Resources\PencatatanResource\Pages;

use App\Filament\Resources\PencatatanResource;
use Filament\Pages\Actions;
use App\Models\Ikan;
use Filament\Resources\Pages\EditRecord;

class EditPencatatan extends EditRecord
{
    protected static string $resource = PencatatanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
