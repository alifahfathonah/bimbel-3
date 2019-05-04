<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model{

    protected $fillable = [
        'guruid', 'materialid', 'chapter', 'url', 'deskripsi', 'ukuran', 'created_at', 'updated_at'
    ];

}