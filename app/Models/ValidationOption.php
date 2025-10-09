<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ValidationOption extends Model
{
    protected $table = 'validation_options';

    protected $fillable = [
        'opsi',
        'IsTrue',
        'questionId',
    ];

    public function question(): BelongsTo{
       return $this->belongsTo(ValidationQuestion::class, 'questionId');
    }

    public function answer(): HasMany{
        return $this->hasMany(UserAnswer::class, 'option_choice_id');
    }
}
