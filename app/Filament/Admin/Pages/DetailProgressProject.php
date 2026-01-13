<?php

namespace App\Filament\Admin\Pages;

use BackedEnum;
use App\Models\User;
use App\Models\Project;
use Filament\Pages\Page;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use App\Filament\Admin\Resources\SiswaProgress\SiswaProgressResource;

class DetailProgressProject extends Page implements HasTable
{
    use InteractsWithTable;
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Detail Progress Project Siswa';
    protected static ?string $title = 'Detail Progress Project Siswa';
    protected string $view = 'filament.admin.pages.detail-progress-project';

    protected static string $route = 'detail-progress-project/{record?}';

    public ?User $siswa;

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function mount($record): void
    {
        if ($record === null) {
            $this->redirect(SiswaProgressResource::getUrl('index'));
            return;
        }
        $this->siswa = User::findOrFail($record);
    }

    public function getTitle(): string
    {
        return 'Detail Progress Project: ' . ($this->siswa?->nama ?? 'Siswa tidak ditemukan');
    }

    protected function getTableQuery(): Builder
    {

        if (!$this->siswa) {
            return Project::query()->whereRaw('1 = 0');
        }

        return Project::query()
            ->with([
                'validation_attemps' => fn($query) =>
                $query->where('user_id', $this->siswa->id)->with('answers'),

                'files' => fn($query) =>
                $query->where('user_id', $this->siswa->id)
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                TextColumn::make('title')
                    ->label('Project'),

                IconColumn::make('is_uploaded')
                    ->label('Upload')
                    ->state(
                        fn(Project $project) =>
                        $project->files->isNotEmpty()
                    )->boolean(),

                IconColumn::make('is_validated')
                    ->label('Evaluasi')
                    ->state(
                        fn(Project $project) =>
                        $project->validation_attemps->firstWhere(
                            fn($attemp) => $attemp->answers->isNotEmpty()
                        ) !== null
                    )->boolean(),
            ])
            ->paginated(false);
    }
}
