<?php

namespace App\Filament\Admin\Resources\Siswas\Schemas;

use App\Models\User;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class SiswaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->label('Nama Lengkap')
                    ->required(),

                TextInput::make('username')
                    ->label('Nama Pengguna')
                    ->required()
                    ->unique(User::class, 'username', ignoreRecord: true),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(User::class, 'email', ignoreRecord: true),

                Select::make('kelas')
                    ->label('Kelas')
                    ->options([
                        'XI RPL A' => 'XI RPL A',
                        'XI RPL B' => 'XI RPL B',
                        'Guru' => 'Guru'
                    ])
                    ->dehydrateStateUsing(fn($state) => $state === 'Guru' ? null : $state)
                    ->required(),

                Select::make('is_admin')
                    ->label('Tambahkan sebagai guru?')
                    ->required()
                    ->options([
                        '0' => 'Tidak',
                        '1' => 'Ya',
                    ]),
            ]);
    }
}
