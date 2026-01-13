<?php

namespace App\Filament\Admin\Resources\Validations\RelationManagers;

use App\Models\UserAnswer;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Actions\DissociateBulkAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\RelationManagers\RelationManager;

class AnswersRelationManager extends RelationManager
{
    protected static string $relationship = 'answers';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([]);
    }

    public function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                TextColumn::make('question.question')
                    ->label('Pertanyaan')
                    ->wrap(),

                TextColumn::make('question.type')
                    ->label('Tipe')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'multiple_choice' => 'Pilihan Ganda',
                        'essay' => 'Essay',
                        default => ucfirst($state),
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'multiple_choice' => 'info',
                        'essay' => 'warning',
                        default => 'gray',
                    }),
                TextColumn::make('essay_answer')->label('Jawaban Siswa')->wrap(),
                TextColumn::make('option.opsi')->label('Jawaban Pilihan Ganda')->wrap(),
                IconColumn::make('option.IsTrue')->label('Benar?')->boolean(),
                TextColumn::make('nilai_essay')->label('Nilai Essay')->wrap(),
                TextColumn::make('created_at')->label('Waktu Jawab'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // CreateAction::make(),
                // AssociateAction::make(),
            ])
            ->recordActions([
                Action::make('masukkan_nilai_essay')
                    ->label('Input Nilai')
                    ->icon('heroicon-o-pencil-square')
                    ->visible(function (UserAnswer $record): bool {
                        return $record->question?->type === 'essay';
                    })
                    ->modal()
                    ->modalHeading('Beri Nilai Jawaban Esai')
                    ->schema([
                        Textarea::make('pertanyaan_text')
                            ->label('Pertanyaan')
                            ->default(fn(UserAnswer $record) => $record->question?->question) // Sesuaikan 'text'
                            ->disabled()
                            ->dehydrated(false),

                        Textarea::make('essay_answer')
                            ->label('Jawaban Siswa')
                            ->default(fn(UserAnswer $record) => $record->essay_answer)
                            ->disabled()
                            ->dehydrated(false),

                        TextInput::make('nilai_essay')
                            ->label('Nilai')
                            ->numeric()
                            ->required(),
                    ])

                    ->action(function (UserAnswer $record, array $data): void {
                        $record->update([
                            'nilai_essay' => $data['nilai_essay'],
                        ]);
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // DissociateBulkAction::make(),
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
