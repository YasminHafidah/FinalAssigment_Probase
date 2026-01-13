<?php

namespace App\Filament\Admin\Resources\UploadProjects\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class UploadProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('projectId')
                    ->relationship('project', 'title')
                    ->searchable()
                    ->preload()
                    ->required(),
                FileUpload::make('path')
                    ->label('Upload File Progress')
                    ->required()
                    ->disk('public')
                    ->directory('files')
                    ->storeFileNamesIn('nama_file')
                    ->maxSize(10240)
                    ->columnSpanFull(),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
