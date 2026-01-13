<?php

namespace App\Filament\Admin\Resources\Groups\Schemas;

use App\Models\Group;
use App\Models\User;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class GroupForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('Siswa')
                    ->options(User::query()->where('is_admin', 0)->doesntHave('kelompok')->pluck('nama', 'id')),

                Select::make('group_id')
                    ->label('Kelompok')
                    ->options(function () {
                        return Group::all()->filter->adaSlot()
                            ->pluck('group', 'id')
                            ->toArray();
                    })->required()
            ]);
    }
}
