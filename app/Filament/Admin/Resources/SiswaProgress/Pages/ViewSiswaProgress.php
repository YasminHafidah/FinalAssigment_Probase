<?php

namespace App\Filament\Admin\Resources\SiswaProgress\Pages;

use App\Filament\Admin\Resources\SiswaProgress\SiswaProgressResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSiswaProgress extends ViewRecord
{
    protected static string $resource = SiswaProgressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
