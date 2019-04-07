<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Subject;
use App\Material;
use App\Chapter;

class SubjectController extends Controller
{

    private $path = '../public/modul/';
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

    public function addChapter(Request $request){
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

            $judul_simpan = str_replace(" ", "_", $request['chapter']);
            $nama_file_simpan = $request['guruid'] . "_" . $judul_simpan . "_" . date('Y-m-d') . "." . $eks_file;

            $file->move($this->path, $nama_file_simpan);

            $newChapter = Chapter::insertGetId([
                'guruid' => $request['guruid'],
                'materialid' => $request['materialid'],
                'chapter' => $request['chapter'],
                'url' => url('/modul') . "/" . $nama_file_simpan,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            if($newChapter){
                $status = true;
                $message = "Berhasil menambah bahan pelajaran";
                $result = Chapter::where('id', $newChapter)->get()->toArray();
            }
        }
        
        return response()->json(array("status" => $status, "message" => $message, 'result' => $result));
    }
}