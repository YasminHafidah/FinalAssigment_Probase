<?php

namespace App\Filament\Admin\Resources\UploadProjects\Pages;

use App\Filament\Admin\Resources\UploadProjects\UploadProjectResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUploadProject extends EditRecord
{
    protected static string $resource = UploadProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
