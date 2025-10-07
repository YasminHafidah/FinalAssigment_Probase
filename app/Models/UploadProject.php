<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UploadProject extends Model
{
    protected $table = 'upload_projects';

    protected $fillable = [
        'nama_file',
        'path',
        'user_id',
        'projectId',
    ];

    /**
     * Get the user that owns the UploadProject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'projectId');
    }

    // public static function createUser(array $data): self
    // {
    //     return self::create([
    //         'nama_file' => $data['nama_file'],
    //         'nama' => $data['nama'],
    //         'kelas' => $data['kelas'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
}
