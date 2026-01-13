<?php

namespace App\Filament\Admin\Resources\SiswaProgress\Pages;

use App\Filament\Admin\Resources\SiswaProgress\SiswaProgressResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSiswaProgress extends EditRecord
{
    protected static string $resource = SiswaProgressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
