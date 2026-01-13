<?php

namespace App\Filament\Admin\Resources\Validations\Tables;

use App\Models\ValidationAttemp;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ValidationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.nama')
                    ->label('Nama Siswa')
                    ->searchable(),

                TextColumn::make('user.kelas')
                    ->label('Kelas')
                    ->searchable(),

                TextColumn::make('project.title')
                    ->label('Project')
                    ->searchable(),

                TextColumn::make('score')
                    ->label('Nilai PG')
                    ->sortable()
                    ->formatStateUsing(function ($state, ValidationAttemp $record) {
                        if ($state == null) {
                            return 'Belum dinilai';
                        }
                        $jumlahPertanyaan = $record->project?->pertanyaan_PG ?? 0;
                        if ($jumlahPertanyaan == 0) {
                            return $state;
                        } else {
                            return $state . '/' . $jumlahPertanyaan;
                        }
                    }),

                TextColumn::make('answers.nilai_essay')
                    ->label('Nilai Essay')
                    ->sortable()
                    ->placeholder('Belum Dinilai'),

                TextColumn::make('created_at')
                    ->label('Mulai Evaluasi')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

                TextColumn::make('completed_at')
                    ->label('Akhir Evaluasi')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([])
            ->recordActions([])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
