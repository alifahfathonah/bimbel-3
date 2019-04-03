<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;

class MaterialController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function listAll($subjectid){
        
        $data = array();
        $result = Material::All();
        if(!$result->isEmpty()){
            $data['status'] = true;
            $data['message'] = "Berhasil";
            $data['result'] = array();
        }else{
            $data['status'] = false;
            $data['message'] = "Data kosong";
            $data['result'] = $result;
        }
        
        return $data;
    }

}