<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Observers\UserObserver;
use Filament\Panel as FilamentPanel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Filament\Models\Contracts\HasName;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

#[ObservedBy([UserObserver::class])]
class User extends Authenticatable implements FilamentUser, HasName
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'nama',
        'kelas',
        'email',
        'password',
        'is_admin',
        'google_id',
        'google_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function createUser(array $data): self
    {
        return self::create([
            'username' => $data['username'],
            'nama' => $data['nama'],
            'kelas' => $data['kelas'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function uploads(): HasMany
    {
        return $this->hasMany(UploadProject::class, 'user_id');
    }

    public function validations(): HasMany
    {
        return $this->hasMany(ValidationAttemp::class, 'user_id');
    }

    public function answers(): BelongsTo
    {
        return $this->belongsTo(ValidationAttemp::class, 'user_id');
    }

    public function canAccessPanel(FilamentPanel $panel): bool
    {
        return $this->is_admin == 1;
    }

    public function getFilamentName(): string
    {
        return $this->username ?? $this->nama ?? $this->email ?? 'User';
    }

    public function kelompok()
    {
        return $this->belongsToMany(
            Group::class,
            'user_groups',
            'user_id',
            'group_id'
        );
    }

    public function modul_progress(): HasMany
    {
        return $this->hasMany(UserModulProgress::class, 'user_id');
    }

    public function kelompokTerakhir(): HasOne
    {
        return $this->hasOne(UserGroup::class, 'user_id')->latestOfMany();
    }

    public function kelompokBaru(): BelongsToMany
    {
        return $this->belongsToMany(
            Group::class,
            'user_groups',
            'user_id',
            'group_id'
        )
            ->withTimestamps()
            ->latest('pivot_created_at');
    }

    public function completedModules(): HasManyThrough
    {
        return $this->hasManyThrough(
            Modul::class,
            UserModulProgress::class,
            'user_id',
            'id',
            'id',
            'modul_id'
        );
    }
}
