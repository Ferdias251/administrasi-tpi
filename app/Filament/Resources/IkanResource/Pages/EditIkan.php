<?php

namespace App\Filament\Resources\IkanResource\Pages;

use App\Filament\Resources\IkanResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIkan extends EditRecord
{
    protected static string $resource = IkanResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
