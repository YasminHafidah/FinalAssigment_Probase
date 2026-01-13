<?php

namespace App\Filament\Admin\Resources\Groups\Tables;

use App\Models\User;
use App\Models\Group;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\Select;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class GroupsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(function ($query) {
                // Ambil semua user non-admin, tanpa join yang mengganggu EditAction
                return User::query()->where('is_admin', 0);
            })
            ->columns([
                TextColumn::make('nama')->label('Siswa')->searchable(),
                TextColumn::make('kelas')->label('Kelas')->searchable(),
                TextColumn::make('kelompok')
                    ->label('Kelompok')
                    ->getStateUsing(fn($record) => $record->kelompok->first()?->group ?? 'Belum Ada Kelompok')
            ])

            ->filters([
                SelectFilter::make('kelas')
                    ->options([
                        'XI RPL A' => 'XI RPL A',
                        'XI RPL B' => 'XI RPL B',
                    ]),
                SelectFilter::make('group_id')
                    ->label('Kelompok')
                    ->options(fn() => Group::pluck('group', 'id'))
                    ->query(function (Builder $query, $data) {
                        if (!empty($data['value'])) {
                            $query->whereHas('kelompok', function ($q) use ($data) {
                                $q->where('groups.id', $data['value']);
                            });
                        }
                    }),
            ])
            ->Actions([
                Action::make('assign_or_edit_group')
                    ->label(fn($record) => $record->kelompok->isEmpty() ? 'Masukkan Kelompok' : 'Edit Kelompok')
                    ->form([
                        Select::make('group_id')
                            ->label('Pilih Kelompok')
                            ->options(function ($record) {
                                // Filter kelompok: yang masih ada slot, atau kelompok saat ini
                                return Group::all()
                                    ->filter(function ($group) use ($record) {
                                        $currentGroupId = $record->kelompok->first()?->id;
                                        return $group->adaSlot() || $group->id == $currentGroupId;
                                    })
                                    ->pluck('group', 'id')
                                    ->toArray();
                            })
                            ->default(fn($record) => $record->kelompok->first()?->id)
                            ->required(),
                    ])
                    ->action(function ($record, array $data) {
                        $group = Group::find($data['group_id']);

                        $currentGroupId = $record->kelompok->first()?->id;

                        if (!$group->adaSlot() && $group->id != $currentGroupId) {
                            Notification::make()
                                ->title('Kelompok sudah penuh')
                                ->danger()
                                ->send();
                            return;
                        }

                        $record->kelompok()->sync([$group->id]);

                        Notification::make()
                            ->title($currentGroupId ? 'Kelompok berhasil diubah' : 'Siswa berhasil dimasukkan ke kelompok')
                            ->success()
                            ->send();
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
