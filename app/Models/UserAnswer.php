<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAnswer extends Model
{
    protected $table = 'user_answers';

    protected $fillable = [
        'validation_attemp_id',
        'question_id',
        'option_choice_id',
        'essay_answer',
        'nilai_essay'
    ];

    public function question():BelongsTo{
        return $this->belongsTo(ValidationQuestion::class,'question_id');
    }

    public function option():BelongsTo{
        return $this->belongsTo(ValidationOption::class,'option_choice_id');
    }

    public function attempt():BelongsTo{
        return $this->belongsTo(ValidationAttemp::class,'validation_attempt_id');
    }
}
