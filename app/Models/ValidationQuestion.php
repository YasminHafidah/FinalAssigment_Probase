<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ValidationQuestion extends Model
{
    protected $table = 'validation_questions';
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'question',
        'type',
        'materialID',
    ];

    /**
     * Get all of the options for the ValidationQuestion
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options(): HasMany
    {
        return $this->hasMany(ValidationOption::class, 'questionId');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(UserAnswer::class, 'question_id');
    }

    public function materials():BelongsTo
    {
        return $this->belongsTo(ProjectMaterial::class, 'materialID');
    }
}
