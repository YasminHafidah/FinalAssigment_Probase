<?php

namespace App\Filament\Admin\Resources\SiswaProgress\Tables;

use App\Filament\Admin\Pages\DetailProgressProject;
use view;
use App\Models\User;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Infolists\Components\ViewEntry;
use App\Filament\Admin\Resources\SiswaProgress\Schemas\SiswaProgressForm;
use Filament\Forms\Components\RichEditor\Actions\LinkAction;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationManager;
use Filament\Tables\Actions\NavigateAction;

class SiswaProgressTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama Siswa')->searchable(),
                TextColumn::make('kelompok.group')
                    ->label('Kelompok')
                    ->searchable()
                    ->sortable(),
                ViewColumn::make('progress')
                    ->label('Progress Belajar')
                    ->view('filament.tables.columns.siswa-progress'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                // Action::make('view_detail')
                //     ->label('Lihat Detail Project')
                //     ->url(fn(User $record): string => DetailProgressProject::getUrl([
                //         'record' => $record->id 
                //     ])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
