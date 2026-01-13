<?php

namespace App\Filament\Admin\Resources\Siswas\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use phpDocumentor\Reflection\Types\Null_;

class SiswasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama Lengkap')->searchable(),
                TextColumn::make('username')->label('Nama Pengguna')->searchable(),
                TextColumn::make('email')->label('Email'),
                TextColumn::make('kelas')->label('Kelas')->searchable(),
                IconColumn::make('is_admin')->label('Guru')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('kelas')
                    ->options([
                        'XI RPL A' => 'XI RPL A',
                        'XI RPL B' => 'XI RPL B',
                    ]),
                SelectFilter::make('is_admin')
                    ->options([
                        '0' => 'Siswa',
                        '1' => 'Guru',
                    ])
                    ->label('Guru/Siswa'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
