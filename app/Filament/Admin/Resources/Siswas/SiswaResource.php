<?php

namespace App\Filament\Admin\Resources\Siswas;

use BackedEnum;
use App\Models\User;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Admin\Resources\Siswas\Pages\EditSiswa;
use App\Filament\Admin\Resources\Siswas\Pages\ViewSiswa;
use App\Filament\Admin\Resources\Siswas\Pages\ListSiswas;
use App\Filament\Admin\Resources\Siswas\Pages\CreateSiswa;
use App\Filament\Admin\Resources\Siswas\Schemas\SiswaForm;
use App\Filament\Admin\Resources\Siswas\Tables\SiswasTable;
use App\Filament\Admin\Resources\Siswas\Schemas\SiswaInfolist;
use Filament\Resources\RelationManagers\RelationManager;

class SiswaResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationLabel = 'Siswa/Guru';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return SiswaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SiswaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SiswasTable::configure($table);
    }



    public static function getPages(): array
    {
        return [
            'index' => ListSiswas::route('/'),
            'create' => CreateSiswa::route('/create'),
            'view' => ViewSiswa::route('/{record}'),
            'edit' => EditSiswa::route('/{record}/edit'),
        ];
    }
}
