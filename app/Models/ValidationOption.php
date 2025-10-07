<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValidationOption extends Model
{
    protected $table = 'validation_options';

    protected $fillable = [
        'opsi',
        'IsTrue',
        'questionId',
    ];
}
