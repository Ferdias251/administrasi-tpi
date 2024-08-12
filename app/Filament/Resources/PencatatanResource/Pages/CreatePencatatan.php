<?php

namespace App\Filament\Resources\PencatatanResource\Pages;

use App\Filament\Resources\PencatatanResource;
use Filament\Pages\Actions;
use App\Models\Ikan;
use Filament\Resources\Pages\CreateRecord;

class CreatePencatatan extends CreateRecord
{
    protected static string $resource = PencatatanResource::class;
}
