<?php

namespace App\Filament\Admin\Resources\UploadProjects;

use App\Filament\Admin\Resources\UploadProjects\Pages\CreateUploadProject;
use App\Filament\Admin\Resources\UploadProjects\Pages\EditUploadProject;
use App\Filament\Admin\Resources\UploadProjects\Pages\ListUploadProjects;
use App\Filament\Admin\Resources\UploadProjects\Schemas\UploadProjectForm;
use App\Filament\Admin\Resources\UploadProjects\Tables\UploadProjectsTable;
use App\Models\UploadProject;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UploadProjectResource extends Resource
{
    protected static ?string $model = UploadProject::class;

    protected static ?string $navigationLabel = 'Hasil Upload Progress Siswa';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return UploadProjectForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UploadProjectsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUploadProjects::route('/'),
            // 'create' => CreateUploadProject::route('/create'),
            // 'edit' => EditUploadProject::route('/{record}/edit'),
        ];
    }
}
