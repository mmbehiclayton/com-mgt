<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class CustomSidebarProvider extends ServiceProvider
{
    public function boot(): void
    {
        Filament::serving(function () {
            if (auth()->check() && auth()->user()->is_admin) {
                Filament::registerNavigationItems([
                    NavigationItem::make('Admin Panel')
                        ->url(route('filament.admin.dashboard')) // Use valid Filament route
                        ->icon('heroicon-o-cog') // Ensure the icon is available
                        ->activeIcon('heroicon-s-cog')
                        ->group('Admin')
                        ->sort(1),
                ]);
            }
        });
    }
}
