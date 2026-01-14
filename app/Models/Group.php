<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = [
        'kelompok',
        'meet',
        'max',
        'question'
    ];

    public function user():BelongsToMany{
        return $this->belongsToMany(User::class,'user_groups','group_id','user_id');
    }

    public function hitungAnggota():int{
        return $this->user()->count();
    }

    public function adaSlot():bool{
        return $this->max === null || $this->hitungAnggota() < $this->max;
    }
}
