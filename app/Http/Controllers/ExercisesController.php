<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Material;
use App\Exercise;

class ExercisesController extends Controller
{

    private $path = '../public/latihan/';
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
        $message = "";
        $result = array();

        $material = Material::where('subjectid', 1)->get();
        if(!$material->isEmpty()){
            $status = true;
            $message = "Berhasil, list data exercises";
            foreach($material as $key => $val_mat){
                $exercise = Exercise::where('materialid', $val_mat['id'])->get()->toArray();
                $material[$key]['exercises'] = $exercise;
            }
            $result = $material;
        }

        return response()->json(array("status" => $status, "message" => $message, "result" => $result));
    }

    public function addExercise(Request $request){
        $status = false;
        $message = "";

        $max_upload = min(ini_get('post_max_size'), ini_get('upload_max_filesize'));
        $max_upload = str_replace('M', '', $max_upload);
        $max_upload = $max_upload * 1024;

        $validator = Validator::make($request->only(['file']), [
            'file' => 'max:' . $max_upload
        ]);

        if ($validator->fails()) {
            $message = $validator->errors();
        }else{
            $file = $request->file('file');
            $eks_file = $file->getClientOriginalExtension();

            $judul_simpan = str_replace(" ", "_", $request['exercise']);
            $nama_file_simpan = $request['guruid'] . "_" . $judul_simpan . "_" . date('Y-m-d') . "." . $eks_file;

            $file->move($this->path, $nama_file_simpan);

            $newExercise = Exercise::insertGetId([
                'guruid' => $request['guruid'],
                'materialid' => $request['materialid'],
                'exercise' => $request['exercise'],
                'url' => url('/latihan') . "/" . $nama_file_simpan,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            if($newExercise){
                $status = true;
                $message = "Berhasil menambah latihan";
                $result = Exercise::where('id', $newExercise)->get()->toArray();
            }
        }
        
        return response()->json(array("status" => $status, "message" => $message, 'result' => $result));
    }

    public function deleteExercise($exerciseid){
        $status = false;
        $message = "";

        $exercise = Exercise::where('id', $exerciseid)->first();

        if($exercise){
            $url = $exercise->url;
            $arr_url = explode('/', $url);
            $file = $arr_url[count($arr_url) - 1];

            unlink($this->path . $file);
            $delete = $exercise->delete();
            if($delete){
                $status = true;
                $message = "Data berhasil dihapus";
            }
        }

        return response()->json(array("status" => $status, "message" => $message));
    }
    
}