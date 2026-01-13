<?php

namespace App\Filament\Admin\Resources\UploadProjects\Pages;

use App\Filament\Admin\Resources\UploadProjects\UploadProjectResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUploadProjects extends ListRecords
{
    protected static string $resource = UploadProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
