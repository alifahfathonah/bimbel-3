<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model{

    protected $fillable = [
        'siswaid', 'exerciselid', 'url', 'ukuran', 'nilai', 'keterangan', 'created_at', 'updated_at'
    ];

}