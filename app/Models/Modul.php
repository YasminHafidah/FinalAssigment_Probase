<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Modul extends Model
{

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'title',
        'slug',
        'body',
        'quiz',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($modul) {
            $modul->slug = Str::slug($modul->title);
        });
    }
}
