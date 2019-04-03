<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Material;
use App\Chapter;

class SubjectController extends Controller
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

    public function listAll(){
        $status = false;
        $mesasge = "";
        $result = Subject::all();

        if(!$result->isEmpty()){
            $status = true;
            $message = "Berhasil";
            $material = Material::where('subjectid', 1)->get()->toArray();
            $material_chap = array();
            foreach($material as $key => $val_mat){
                $material_chap[$key] = $val_mat;
                $chapter = Chapter::where('materialid', $val_mat['id'])->get()->toArray();
                if(count($chapter) > 0){
                    $material_chap[$key]['chapter'] = $chapter;
                }
            }
            $result[0]['materi'] = $material_chap;
        }else{
            $result = array();
        }

        return response()->json(array("status" => $status, "message" => $message, "result" => $result));
    }

    //
}