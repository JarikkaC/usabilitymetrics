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
        return $this->hasMany(metric::class, 'id');
    }

    public function submetric()
    {
        return $this->hasMany(submetric::class, 'id');
    }

    public function project(){
        return $this->belongsTo(project::class,'id');
    }


}
