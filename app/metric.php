<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class metric extends Model
{
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'metric_name',
    ];
}
