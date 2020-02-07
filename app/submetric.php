<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class submetric extends Model
{
    protected $fillable = [
        'id', 'submetric_name', 'purpose', 'method', 'measurement', 'scale', 'type', 'input', 'iso', 'target', 'metric_id'
    ];
    
    public function metric(){
        return $this->belongsTo(metric::class,'id');
    }

}
