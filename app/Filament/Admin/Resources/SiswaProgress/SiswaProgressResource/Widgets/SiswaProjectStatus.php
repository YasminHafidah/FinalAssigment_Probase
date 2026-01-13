<?php

namespace App\Filament\Admin\Resources\SiswaProgress\SiswaProgressResource\Widgets;

use App\Models\User;
use App\Models\Project;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class SiswaProjectStatus extends TableWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(fn(): Builder => Project::query())
            ->columns([
                TextColumn::make('title') // Ganti 'name' dengan kolom nama proyek Anda
                    ->label('Nama Proyek'),

                // Kolom Status Upload
                IconColumn::make('upload_status')
                    ->label('Status Upload')
                    ->boolean()
                    ->state(function (Project $projectRecord): bool {
                        return $this->record->uploads()
                            ->where('projectId', $projectRecord->id)
                            ->exists();
                    }),

                // Kolom Status Validasi
                IconColumn::make('validation_status')
                    ->label('Status Validasi')
                    ->boolean()
                    ->state(function (Project $projectRecord): bool {
                        return $this->record->validations()
                            ->where('project_id', $projectRecord->id)
                            ->exists();
                    }),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
