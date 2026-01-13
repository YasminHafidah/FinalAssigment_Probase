<?php

namespace App\Filament\Admin\Resources\Validations\Pages;

use App\Filament\Admin\Resources\Validations\ValidationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewValidation extends ViewRecord
{
    protected static string $resource = ValidationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
