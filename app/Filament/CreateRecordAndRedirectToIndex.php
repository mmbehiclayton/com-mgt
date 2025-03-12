<?php

namespace App\Filament;

use App\Filament\App\Resources\ComplaintResource\Pages\CreateComplaint;

class CreateRecordAndRedirectToIndex extends CreateComplaint
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::geUrl('index');
    }
}
