<?php

namespace App\Filament\Admin\Resources\Validations\Pages;

use App\Filament\Admin\Resources\Validations\ValidationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateValidation extends CreateRecord
{
    protected static string $resource = ValidationResource::class;
}
