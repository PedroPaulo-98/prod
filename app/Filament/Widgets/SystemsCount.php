<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\System;


class SystemsCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Sistemas', System::count())
            ->icon('heroicon-o-computer-desktop')
        ];
    }
}
