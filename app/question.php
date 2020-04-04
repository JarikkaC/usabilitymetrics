<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $fillable = [
        'id', 'question', 'sumetric_id', 'created_at', 'updated_at', 'max_select'
    ];
    
    public function submetric(){
        return $this->belongsTo(submetric::class,'id');
    }
}
