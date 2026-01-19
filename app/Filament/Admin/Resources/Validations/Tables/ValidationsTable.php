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
                    ->sortable(),

                TextColumn::make('answers.nilai_essay')
                    ->label('Nilai Essay')
                    ->sortable()
                    ->placeholder('Belum Dinilai'),

                TextColumn::make('answers_avg_nilai_essay')
                    ->label('Rata-rata Nilai Essay')
                    ->avg('answers', 'nilai_essay')
                    ->sortable()
                    ->formatStateUsing(function ($state, ValidationAttemp $record) {
                        $answers = $record->answers()->whereNotNull('essay_answer')->get();
                        $totalEssay = $answers->count();
                        $sudahDinilai = $answers->whereNotNull('nilai_essay')->count();

                        if ($totalEssay > 0 && $sudahDinilai < $totalEssay) {
                            return 'Belum Lengkap';
                        }

                        return is_null($state) ? 'Belum Dinilai' : number_format($state, 1);
                    })
                    ->color(function ($state, ValidationAttemp $record) {
                        // Kita cek ulang kondisinya di sini
                        $answers = $record->answers()->whereNotNull('essay_answer')->get();
                        $totalEssay = $answers->count();
                        $sudahDinilai = $answers->whereNotNull('nilai_essay')->count();

                        if ($totalEssay > 0 && $sudahDinilai < $totalEssay) {
                            return 'danger'; // Merah jika belum semua dinilai
                        }

                        return is_null($state) ? 'gray' : 'success';
                    }),
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
            ->defaultSort('created_at', 'desc')
            ->recordActions([])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
