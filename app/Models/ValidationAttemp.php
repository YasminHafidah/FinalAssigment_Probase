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
        // 1. Cari Material yang terhubung ke Project ini
        // Karena satu project bisa punya beberapa material, kita ambil ID-nya
        $materialIDs = ProjectMaterial::where('projectId', $this->project_id)->pluck('id');

        // 2. Hitung total soal PG yang ada di materi tersebut
        $totalSoal = ValidationQuestion::whereIn('materialID', $materialIDs)
            ->where('type', 'multiple')
            ->count();

        // 3. Hitung berapa jawaban yang benar
        $jumlahBenar = $this->answers()->whereHas('option', function ($query) {
            $query->where('IsTrue', 1);
        })->count();

        // 4. Hitung skor skala 100
        if ($totalSoal > 0) {
            // Rumus: (Benar / Total Soal) * 100
            $this->score = ($jumlahBenar / $totalSoal) * 100;
        } else {
            $this->score = 0;
        }

        $this->completed_at = now();
        $this->save();

        return $this->score;
    }
}
