<?php

namespace App\Filament\Admin\Resources\Validations;

use App\Filament\Admin\Resources\Validations\Pages\CreateValidation;
use App\Filament\Admin\Resources\Validations\Pages\EditValidation;
use App\Filament\Admin\Resources\Validations\Pages\ListValidations;
use App\Filament\Admin\Resources\Validations\Pages\ViewValidation;
use App\Filament\Admin\Resources\Validations\Schemas\ValidationForm;
use App\Filament\Admin\Resources\Validations\Tables\ValidationsTable;
use App\Models\Validation;
use App\Models\ValidationAttemp;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ValidationResource extends Resource
{
    protected static ?string $model = ValidationAttemp::class;
    protected static ?string $navigationLabel = 'Hasil Evaluasi Siswa';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ValidationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ValidationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\AnswersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListValidations::route('/'),
            'create' => CreateValidation::route('/create'),
            'view' => ViewValidation::route('/{record}')
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with('user')
            ->with([
                'project' => function ($query) {
                    $query->withCount(['questions as pertanyaan_PG' => function ($q) {
                        $q->where('type', 'multiple');
                    }]);
                }
            ])
            ->whereHas('answers');
    }
}
