<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectMaterial extends Model
{
    protected $table = 'project_materials';

    protected $fillable = [
        'nama_material',
        'urutan',
        'project_id',
        'category_id'
    ];

    /**
     * Get all of the comments for the ProjectMaterial
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions(): HasMany
    {
        return $this->hasMany(ValidationQuestion::class, 'materialID');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'projectId');
    }
}
