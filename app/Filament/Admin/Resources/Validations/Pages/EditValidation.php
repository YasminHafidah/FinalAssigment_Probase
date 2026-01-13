<?php

namespace App\Filament\Admin\Resources\Validations\Pages;

use App\Filament\Admin\Resources\Validations\ValidationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditValidation extends EditRecord
{
    protected static string $resource = ValidationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
