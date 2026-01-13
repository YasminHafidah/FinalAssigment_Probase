<?php

namespace App\Filament\Admin\Resources\Siswas\Pages;

use Illuminate\Support\Facades\Hash;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\Siswas\SiswaResource;

class CreateSiswa extends CreateRecord
{
    protected static string $resource = SiswaResource::class;

    protected function afterCreate(): void
    {
        if (empty($this->record->password)) {
            $this->record->update([
                'password' => Hash::make('password123'),
            ]);
        }
    }
}
