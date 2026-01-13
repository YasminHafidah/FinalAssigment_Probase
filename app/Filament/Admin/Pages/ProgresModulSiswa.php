<?php

namespace App\Filament\Admin\Pages;

use BackedEnum;
use App\Models\User;
use App\Models\Modul;
use Filament\Pages\Page;
use Filament\Tables\Table;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Tables\Concerns\InteractsWithTable;


class ProgresModulSiswa extends Page implements HasTable
{
    use InteractsWithTable;
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-presentation-chart-line';
    protected static ?string $navigationLabel = 'Progress Modul Siswa';
    protected static ?string $title = 'Progress Modul Siswa';
    protected string $view = 'filament.admin.pages.progres-modul-siswa';

    protected function getTableQuery(): Builder
    {
        return User::query()
            ->where('is_admin', 0)
            ->withCount('completedModules')
            ->with('completedModules.category');
    }

    public function table(Table $table): Table
    {
        $totalModules = Modul::count();

        return $table
            ->query($this->getTableQuery())
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama Siswa')
                    ->searchable(),

                TextColumn::make('kelas')
                    ->label('Kelas')
                    ->searchable(),

                ViewColumn::make('progress')
                    ->label('Progress Modul')
                    ->view('filament.tables.columns.progress-modul')
                    ->viewData([
                        'total_modules' => $totalModules
                    ]),
            ])
            ->filters([
                // ... (Tambahkan filter jika perlu)
            ])
            ->recordActions([
                ViewAction::make()
                    ->label('Lihat Detail')
                    ->modalHeading('Detail Progress Siswa')
                    ->infolist([
                        TextEntry::make('nama')
                            ->label('Nama Siswa'),

                        ViewEntry::make('completed_modules_list')
                            ->label('Modul yang diakses')
                            ->view('filament.infolists.components.modul-selesai'),
                    ]),
            ]);
    }
}
