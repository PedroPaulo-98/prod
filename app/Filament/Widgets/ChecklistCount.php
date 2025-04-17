<?php

namespace App\Filament\Widgets;

use App\Models\Checklist;
use App\Models\Dropdesk;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ChecklistCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Checklists Feitos', Checklist::count())
                ->icon('heroicon-o-document-check'),
            Stat::make('Dropdesk', Dropdesk::count())
                ->icon('heroicon-o-document-check'),
        ];
    }
}
