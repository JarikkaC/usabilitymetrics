<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class metric extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'metric_name', 'id'
    ];

    public function submetric()
    {
        return $this->hasMany(submetric::class, 'metric_id');
    }

    public function metricmodel(){
        return $this->belongsTo(metricmodel::class,'id');
    }
}
