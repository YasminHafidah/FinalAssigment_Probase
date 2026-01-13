<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModulProgress extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    public $timestamps = false;

    protected $table = 'user_modul_progress';

    protected $fillable = [
        'user_id',
        'modul_id',
        'created_at',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function modul():BelongsTo{
        return $this->belongsTo(Modul::class, 'modul_id');
    }
}
