<?php

namespace App\Filament\Admin\Resources\SiswaProgress;

use BackedEnum;
use App\Models\User;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Widgets\Widget;
use App\Models\SiswaProgress;
use Filament\Resources\Resource;
use Illuminate\Contracts\View\View;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Filament\Admin\Resources\SiswaProgress\Pages\EditSiswaProgress;
use App\Filament\Admin\Resources\SiswaProgress\Pages\ListSiswaProgress;
use App\Filament\Admin\Resources\SiswaProgress\Pages\ViewSiswaProgress;
use App\Filament\Admin\Resources\SiswaProgress\Pages\CreateSiswaProgress;
use App\Filament\Admin\Resources\SiswaProgress\Schemas\SiswaProgressForm;
use App\Filament\Admin\Resources\SiswaProgress\Tables\SiswaProgressTable;
use App\Filament\Admin\Resources\SiswaProgress\Schemas\SiswaProgressInfolist;
use App\Filament\Admin\Resources\SiswaProgress\SiswaProgressResource\Widgets\SiswaProjectStatus;

class SiswaProgressResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationLabel = 'Progress Project Siswa';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';


    public static function infolist(Schema $schema): Schema
    {
        return SiswaProgressInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SiswaProgressTable::configure($table);
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
            'index' => ListSiswaProgress::route('/'),
        ];
    }
}
