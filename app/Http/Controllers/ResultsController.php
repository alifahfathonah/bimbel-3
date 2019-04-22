<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Exercise;
use App\Result;

class ResultsController extends Controller
{

    private $path = '../public/jawaban/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function listAllGuru($exerciseid){
        $status = false;
        $message = "";
        $result = array();

        $result_tabel = Result::where('exerciseid', $exerciseid)->get();

        if(!$result_tabel->isEmpty()){
            $status = true;
            $message = "Berhasil, list data result";
            $result = $result_tabel;
        }

        return response()->json(array("status" => $status, "message" => $message, "result" => $result));
    }

    public function listAllSiswa($siswaid, $exerciseid){
        $status = false;
        $message = "";
        $result = array();

        $result_tabel = Result::where(['siswaid' => $siswaid, 'exerciseid' => $exerciseid])->get();

        if(!$result_tabel->isEmpty()){
            $status = true;
            $message = "Berhasil, list data result";
            $result = $result_tabel;
        }

        return response()->json(array("status" => $status, "message" => $message, "result" => $result));
    }

    public function addResult(Request $request){
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

            // $judul_simpan = str_replace(" ", "_", $request['exercise']);
            $nama_file_simpan = $request['siswaid'] . "_" . $request['exerciseid'] . "_" . date('Y-m-d') . "." . $eks_file;

            $file->move($this->path, $nama_file_simpan);

            $newResult = Result::insertGetId([
                'siswaid' => $request['siswaid'],
                'exerciseid' => $request['exerciseid'],
                'url' => url('/jawaban') . "/" . $nama_file_simpan,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            if($newResult){
                $status = true;
                $message = "Berhasil menambah jawaban";
                $result = Result::where('id', $newResult)->get()->toArray();
            }
        }
        
        return response()->json(array("status" => $status, "message" => $message, 'result' => $result));
    }

    public function addNilai(Request $request){
        $status = false;
        $message = "";

        $result_tabel = Result::find($request['id'])->update([
            'nilai'         => $request['nilai'],
            'keterangan'    => $request['keterangan']
        ]);

        if($result_tabel){
            $status = true;
            $message = "Berhasil memberikan nilai";
        }

        return response()->json(array("status" => $status, "message" => $message));
    }
    
}