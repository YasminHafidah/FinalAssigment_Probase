<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class TheoryValidation extends Model
{
    protected $table = 'theory_validations';

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'pertanyaan',
        'opsi1',
        'opsi2',
        'opsi3',
        'opsi4',
        'projectId',
    ];
}
