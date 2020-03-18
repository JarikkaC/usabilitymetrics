<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $fillable = [
        'id', 'question', 'model_id', 'created_at', 'updated_at',
    ];
}
