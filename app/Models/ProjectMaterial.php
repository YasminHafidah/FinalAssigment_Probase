<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectMaterial extends Model
{
    protected $table = 'project_materials';

    /**
     * Get all of the comments for the ProjectMaterial
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions(): HasMany
    {
        return $this->hasMany(ValidationQuestion::class, 'materialID');
    }
}
