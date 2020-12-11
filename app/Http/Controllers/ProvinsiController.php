<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provinsi;
use Validator;

class ProvinsiController extends Controller
{
    //

    public function index(){

        $data = Provinsi::paginate(10);
        $kode = 200;
        $pesan = "Data Provinsi";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function show($id){

        $data = Provinsi::find($id);
        $kode = 200;
        $pesan = "Data Provinsi";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function indexList(){

        $data = Provinsi::get();
        $kode = 200;
        $pesan = "Data Provinsi";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'id' => 'required|numeric|min:1|max:999|unique:provinsi',
            'nama' => 'required|string',
        ]);

        if ($validator->fails()) {
            $response = [
                'message'=>$validator->errors()->first(),
                'result'=>null,
                'code'=>422
            ];
            return response()->json($response, $response['code']);
        }
        $kode = 404;
        $pesan = "Failed Create Provinsi";
        $data = new Provinsi;

        $data->id=$request->id;
        $data->nama=$request->nama;
        if($data->save()){

            $kode = 201;
            $pesan = "Success Create Provinsi";
        }

        $response =[
            "message"=> $pesan,
            "results"=> null,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function update(Request $request,$id){
        $kode = 404;
        $pesan = "Failed update Provinsi";

        $validator = Validator::make($request->all(),[
            'id' => 'required|numeric|min:1|max:999|unique:provinsi,id,'.$id,
            'nama' => 'required|string',
        ]);

        if ($validator->fails()) {
            $response = [
                'message'=>$validator->errors()->first(),
                'result'=>null,
                'code'=>422
            ];
            return response()->json($response, $response['code']);
        }
        $data = Provinsi::find($id);
        if($data){
            $data->id=$request->id;
            $data->nama=$request->nama;
            if($data->save()){
                $kode = 200;
                $pesan = "Success update Provinsi";
            }
        }
        $response =[
            "message"=> $pesan,
            "results"=> null,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function destroy($id){

        $kode = 404;
        $pesan = "Failed delete Provinsi";
        $data = Provinsi::find($id);
        if($data){
            if($data->delete()){
                $kode = 200;
                $pesan = "Success delete Jenjang Pendidikan";
            }
        }

        $response =[
            "message"=> $pesan,
            "results"=> null,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
}
