<?php

namespace App\Filament\App\Resources\ComplaintResource\Pages;

use App\Filament\App\Resources\ComplaintResource;

use Filament\Resources\Pages\CreateRecord;

class CreateComplaint extends CreateRecord
{
    protected static string $resource = ComplaintResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }




}
