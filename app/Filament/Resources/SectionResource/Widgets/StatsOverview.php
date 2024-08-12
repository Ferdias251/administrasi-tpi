<?php

namespace App\Filament\Resources\SectionResource\Widgets;

use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use App\Models\Nelayan;
use App\Models\Ikan;
use App\Models\Pencatatan;

class StatsOverview extends BaseWidget
{
    //protected static string $view = 'filament.resources.section-resource.widgets.stats-overview';
    protected function getCards(): array
    {
        return [
            Card::make('Nelayan', Nelayan::all()->count())
            ->description('Jumlah data')
            ->descriptionIcon('heroicon-o-user-group'),
            Card::make('Ikan', Ikan::all()->count())
            ->description('Jenis Ikan')
            ->descriptionIcon('heroicon-o-trending-up'),
            Card::make('Data Administrasi', Pencatatan::all()->count())
            ->description('Data tersimpan')
            ->descriptionIcon('heroicon-o-archive'),
        ];
    }
}
