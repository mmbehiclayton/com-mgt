<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->description('Total number of registered users')
                ->icon('heroicon-m-user-group'),

            Stat::make('Admins', User::where('is_admin', true)->count())
                ->description('Number of admin users')
                ->color('success')
                ->icon('heroicon-m-shield-check'),

            Stat::make('Non-Admins', User::where('is_admin', false)->count())
                ->description('Number of non-admin users')
                ->color('warning')
                ->icon('heroicon-m-user'),
        ];
    }
}
