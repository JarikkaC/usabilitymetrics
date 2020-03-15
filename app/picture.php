<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class picture extends Model
{
    protected $fillable = [
        'id', 'picture_path', 'version_id', 'project_id', 'created_at', 'updated_at'
    ];

    public function project()
    {
        return $this->belongsTo(project::class, 'project_id');
    }

}
