<?php

namespace App\Filament\Admin\Resources\SiswaProgress\Pages;

use App\Filament\Admin\Resources\SiswaProgress\SiswaProgressResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSiswaProgress extends ListRecords
{
    protected static string $resource = SiswaProgressResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         CreateAction::make(),
    //     ];
    // }
}
