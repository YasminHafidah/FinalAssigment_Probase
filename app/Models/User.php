<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
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

    public function answers(): BelongsTo
    {
        return $this->belongsTo(ValidationAttemp::class,'user_id');
    }
}
