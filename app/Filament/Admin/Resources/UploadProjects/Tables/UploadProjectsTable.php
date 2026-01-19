<?php

namespace App\Filament\Admin\Resources\UploadProjects\Tables;

use Filament\Tables\Table;
use Filament\Actions\Action;
use App\Models\UploadProject;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Illuminate\Support\HtmlString;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\Select;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms\Components\Placeholder;

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

                Action::make('penilaian_proyek')
                    ->label('Penilaian Proyek')
                    ->icon('heroicon-o-star')
                    ->color('success')
                    ->modalHeading('Form Penilaian Proyek')
                    ->modalSubmitActionLabel('Simpan Penilaian')
                    ->fillForm(fn(UploadProject $record): array => [
                        'notes' => $record->notes,
                        'nilai' => $record->nilai,
                    ])
                    ->form([
                        //tampil kelompok
                        // 1. Menampilkan Info Kelompok
                        Placeholder::make('info_kelompok')
                            ->label('Data Kelompok')
                            ->content(function (UploadProject $record) {
                                $kelompok = $record->user?->kelompokBaru?->first();
                                $namaKelompok = $kelompok->group ?? 'Belum ada kelompok';
                                $question = $kelompok->question ?? 'Belum ada Isu';

                                return new \Illuminate\Support\HtmlString("
                <div class='p-3 bg-gray-50 border border-gray-200 rounded-lg'>
                    <div class='flex items-center gap-2 mb-2'>
                        <span class='text-sm font-bold text-gray-800'>{$namaKelompok}</span>
                    </div>
                    <div class='text-xs text-gray-600 leading-relaxed border-t pt-2 italic'>
                        {$question}
                    </div>
                </div>
            ");
                            }),

                        // 2. PREVIEW FILE SISWA (PDF / GAMBAR / SQL)
                        Placeholder::make('preview_file_siswa')
                            ->label('Hasil Kerja Siswa')
                            ->content(function (UploadProject $record) {
                                $path = $record->path;
                                if (!$path) return "Tidak ada file.";

                                $url = Storage::url($path);
                                $extension = pathinfo($path, PATHINFO_EXTENSION);

                                // Jika file adalah GAMBAR
                                if (in_array($extension, ['jpg', 'jpeg', 'png', 'webp'])) {
                                    return new HtmlString("
                    <div class='mb-4 flex flex-col items-center border rounded-lg p-2 bg-gray-50'>
                        <p class='text-xs text-gray-500 mb-2 font-bold uppercase'>Pratinjau Gambar:</p>
                        <a href='{$url}' target='_blank' class='w-full flex justify-center'>
                            <img src='{$url}' style='max-height: 800px; width: 100%; object-fit: contain; border: 2px solid #3AB0FF; border-radius: 8px;' />
                        </a>
                        <p class='text-[10px] text-gray-400 mt-2'>Klik gambar untuk melihat ukuran penuh</p>
                    </div>
                ");
                                }

                                // Jika file adalah PDF
                                if ($extension === 'pdf') {
                                    return new HtmlString("
                    <div class='mb-4'>
                        <p class='text-xs text-gray-500 mb-1'>Pratinjau PDF:</p>
                        <iframe src='{$url}' width='100%' height='500px' style='border-radius: 8px; border: 1px solid #ccc;'></iframe>
                    </div>
                ");
                                }

                                // Jika file adalah SQL atau lainnya (Hanya kasih link download/lihat)
                                return new HtmlString("
                <div class='mb-4 p-4 bg-gray-50 border rounded-lg flex items-center gap-3'>
                    <svg class='w-8 h-8 text-gray-400' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path d='M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'></path></svg>
                    <div>
                        <p class='text-sm font-bold'>File: {$record->nama_file}</p>
                        <a href='{$url}' target='_blank' class='text-primary-600 underline text-xs font-bold'>Klik untuk Download/Lihat File SQL</a>
                    </div>
                </div>
            ");
                            }),

                        // 3. Menampilkan Gambar Rubrik (Dari Project)
                        Placeholder::make('view_rubrik')
                            ->label('Panduan Rubrik Penilaian')
                            ->content(function (UploadProject $record) {
                                $imagePath = $record->project?->rubrik;
                                if (!$imagePath) return new HtmlString('<span class="text-danger-600 font-bold">Rubrik belum diunggah untuk project ini.</span>');

                                $url = asset('storage/' . $imagePath);
                                return new HtmlString("
            <div class='flex flex-col items-center justify-center p-4 bg-blue-50 border border-blue-200 rounded-xl'>
                <a href='{$url}' target='_blank' class='cursor-zoom-in'>
                    <img src='{$url}' 
                         class='rounded-lg shadow-lg border-2 border-white' 
                         style='max-height: 600px; width: auto; object-fit: contain;' 
                         alt='Rubrik Penilaian' />
                </a>
                <p class='text-xs text-blue-500 mt-3 italic text-center'>Klik rubrik tersebut untuk melihat ukuran penuh di tab baru</p>
            </div>
        ");
                            }),

                        // 4. Input Nilai & Catatan
                        TextInput::make('nilai')
                            ->label('Nilai Akhir (0-100)')
                            ->numeric()
                            ->required(),

                        Textarea::make('notes')
                            ->label('Catatan / Feedback')
                            ->required(),
                    ])
                    ->action(function (UploadProject $record, array $data): void {
                        $record->update([
                            'nilai' => $data['nilai'], // Simpan Nilai
                            'notes' => $data['notes'], // Simpan Catatan
                        ]);
                    }),

                // Action::make('add_notes')
                //     ->label('Catatan')
                //     ->icon('heroicon-o-pencil-square')
                //     ->color('warning')
                //     ->modalHeading('Tambah/Edit Catatan')
                //     ->modalSubmitActionLabel('Simpan Catatan')
                //     ->fillForm(fn(UploadProject $record): array => ['notes' => $record->notes,])
                //     ->form([
                //         Textarea::make('notes')
                //             ->label('Catatan')
                //             ->required(),
                //     ])
                //     ->action(function (UploadProject $record, array $data): void {
                //         // Logika untuk menyimpan data
                //         $record->update([
                //             'notes' => $data['notes'], // Update kolom 'notes'
                //         ]);
                //     }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
