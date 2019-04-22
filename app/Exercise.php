<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model{

    protected $fillable = [
        'guruid', 'chapterlid', 'exercise', 'url', 'created_at', 'updated_at'
    ];

}