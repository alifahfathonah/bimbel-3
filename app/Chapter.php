<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model{

    protected $fillable = [
        'guruid', 'materialid', 'chapter', 'url', 'created_at', 'updated_at'
    ];

}