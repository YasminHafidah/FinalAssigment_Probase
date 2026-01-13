<?php

namespace App\Filament\Admin\Resources\UploadProjects\Tables;

use Filament\Tables\Table;
use Filament\Actions\Action;
use App\Models\UploadProject;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\Select;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Filters\SelectFilter;

class UploadProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.nama')->label('Siswa')
                    ->searchable(),
                TextColumn::make('user.kelas')->label('Kelas')
                    ->searchable(),
                // TextColumn::make('user.kelompok.group')
                //     ->label('Kelompok')
                //     ->searchable()
                //     ->getStateUsing(function (Model $record) {
                //         return $record->user?->kelompokBaru?->first()?->group ?? 'Belum ada kelompok';
                //     })
                //     ->placeholder('Belum ada kelompok'),
                TextColumn::make('project.title')
                    ->searchable(),
                TextColumn::make('nama_file')
                    ->searchable()->label('Nama File'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Tanggal Upload'),
            ])
            ->filters([])
            ->recordActions([
                Action::make('view_file')
                    ->label('Lihat File')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->url(function (UploadProject $record): string {
                        return Storage::url($record->path);
                    })
                    ->openUrlInNewTab(),

                Action::make('add_notes')
                    ->label('Catatan')
                    ->icon('heroicon-o-pencil-square')
                    ->color('warning')
                    ->modalHeading('Tambah/Edit Catatan')
                    ->modalSubmitActionLabel('Simpan Catatan')
                    ->fillForm(fn(UploadProject $record): array => ['notes' => $record->notes,])
                    ->form([
                        Textarea::make('notes')
                            ->label('Catatan')
                            ->required(),
                    ])
                    ->action(function (UploadProject $record, array $data): void {
                        // Logika untuk menyimpan data
                        $record->update([
                            'notes' => $data['notes'], // Update kolom 'notes'
                        ]);
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
