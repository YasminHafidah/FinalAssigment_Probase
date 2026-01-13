<?php

namespace App\Models;

use Doctrine\DBAL\Query;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ValidationAttemp extends Model
{
    protected $table = 'validation_attemps';

    protected $fillable = [
        'user_id',
        'project_id',
        'score',
        'completed_at'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(UserAnswer::class, 'validation_attemp_id');
    }

    public function hitungScorePG()
    {
        $jumlahJawabanBenar = $this->answers()->whereHas('option', function ($query) {
            $query->where('IsTrue', 1);
        })->count();

        $this->score = $jumlahJawabanBenar;
        $this->completed_at = now();
        $this->save();
        return $this->score;
    }
}
