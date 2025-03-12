<?php

namespace App\Filament\App\Resources\ComplaintResource\Pages;

use App\Filament\App\Resources\ComplaintResource;
use App\Filament\CreateRecordAndRedirectToIndex;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComplaint extends CreateRecordAndRedirectToIndex
{
    protected static string $resource = ComplaintResource::class;

}
