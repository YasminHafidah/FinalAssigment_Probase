<?php

namespace App\Models;

use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Project extends Model
{
    protected $table = 'projects';

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'title',
        'slug',
        'guidelines',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($project) {
            $project->slug = Str::slug($project->title);
        });
    }

    /**
     * Get all of thn materials for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function project_materials(): HasMany
    {
        return $this->hasMany(ProjectMaterial::class, 'projectId');
    }
    /**
     * Get all of the questions for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function questions(): HasManyThrough
    {
        return $this->hasManyThrough(
            ValidationQuestion::class,
            ProjectMaterial::class,
            'projectId',
            'materialID'
        );
    }

    /**
     * Get all of the files for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files(): HasMany
    {
        return $this->hasMany(UploadProject::class, 'projectId');
    }

    public function validation_attemps(): HasMany
    {
        return $this->hasMany(ValidationAttemp::class, 'project_id');
    }

    public function user_answer(): HasManyThrough
    {
        return $this->hasManyThrough(
            UserAnswer::class,
            ValidationAttemp::class,
            'project_id',
            'validation_attemp_id'
        );
    }
}
