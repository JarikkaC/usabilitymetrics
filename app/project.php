<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    public function metricmodel()
    {
        return $this->hasMany(metricmodel::class, 'project_id');
    }
}
