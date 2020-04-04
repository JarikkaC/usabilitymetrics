<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    protected $fillable = [
        'id', 'question_id', 'comment', 'project_id', 'picture_path', 'updated_at', 'created_at'
    ];
}
