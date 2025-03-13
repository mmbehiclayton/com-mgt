<?php

namespace App\Filament\App\Resources\ComplaintResource\Pages;

use App\Filament\App\Resources\ComplaintResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListComplaints extends ListRecords
{
    protected static string $resource = ComplaintResource::class;

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All')
                    ->query(fn (Builder $query) => $query),

                'pending' => Tab::make('Pending')
                    ->query(fn (Builder $query) => $query->where('status', 'Pending'))
                    ->icon('heroicon-m-clock'),

                'processing' => Tab::make('Processing')
                    ->query(fn (Builder $query) => $query->where('status', 'Processing'))
                    ->icon('heroicon-m-arrow-path'),

                'resolved' => Tab::make('Resolved')
                    ->query(fn (Builder $query) => $query->where('status', 'Resolved'))
                    ->icon('heroicon-m-check-circle'),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
