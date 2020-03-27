<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class picture extends Model
{
    protected $fillable = [
        'id', 'picture_path', 'version_id', 'project_id', 'metric_id', 'submetric_id', 'created_at', 'updated_at'
    ];

    public function project()
    {
        return $this->belongsTo(project::class, 'project_id');
    }

    public function metric()
    {
        return $this->belongsTo(metric::class, 'metric_id');
    }

    public function submetric()
    {
        return $this->belongsTo(submetric::class, 'submetric_id');
    }
}
