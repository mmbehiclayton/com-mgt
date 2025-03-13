<?php

namespace App\Filament\App\Widgets;

use App\Models\Complaint;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ComplainsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Complaints', Complaint::count())
                ->description('All submitted complaints')
                ->icon('heroicon-m-rectangle-stack'),

            Stat::make('Pending Complaints', Complaint::where('status', 'Pending')->count())
                ->description('Complaints that are still pending')
                ->color('warning')
                ->icon('heroicon-m-clock'),

            Stat::make('Processing Complaints', Complaint::where('status', 'Processing')->count())
                ->description('Complaints currently being processed')
                ->color('info')
                ->icon('heroicon-m-arrow-path'),

            Stat::make('Resolved Complaints', Complaint::where('status', 'Resolved')->count())
                ->description('Complaints that have been resolved')
                ->color('success')
                ->icon('heroicon-m-check-circle'),
        ];
    }
}
