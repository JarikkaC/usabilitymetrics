<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class metricmodel extends Model
{
    protected $fillable = [
        'id', 'project_id', 'metric_id', 'submetric_id', 'project_id', 'created_at', 'updated_at'
    ];

    public function metric()
    {
        return $this->belongsTo(metric::class, 'metric_id');
    }

    public function submetric()
    {
        return $this->belongsTo(submetric::class, 'metric_id');
    }

    public function project(){
        return $this->belongsTo(project::class,'project_id');
    }


}
