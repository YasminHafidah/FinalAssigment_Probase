<?php

namespace App\Filament\Admin\Resources\Projects\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('guidelines')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('rubrik')
                    ->label('Gambar Rubrik Penilaian')
                    ->image() // Memastikan hanya file gambar
                    ->directory('rubrics')
                    ->disk('public') // Akan disimpan di storage/app/public/rubrics
                    ->visibility('public')
                    ->helperText('Upload gambar rubrik untuk fase ini (JPG/PNG).'),
            ]);
    }
}
