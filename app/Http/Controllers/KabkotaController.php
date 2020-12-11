<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kabkota;
use Validator;
class KabkotaController extends Controller
{
    //

    public function indexAll(){

        $data = Kabkota::with('dataProvinsi')->paginate(10);
        $kode = 200;
        $pesan = "Data Kabkota";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function index($idProvinsi){

        $data = Kabkota::where('id_provinsi',$idProvinsi)->with('dataProvinsi')->paginate(10);
        $kode = 200;
        $pesan = "Data Kabkota";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function show($idKabkota){

        $data = Kabkota::with('dataProvinsi')->find($idKabkota);
        $kode = 200;
        $pesan = "Data Kabkota";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function indexList($idProvinsi){

        $data = Kabkota::with('dataProvinsi')->where('id_provinsi',$idProvinsi)->get();
        $kode = 200;
        $pesan = "Data Kabkota Berdasarkan provinsi";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function store(Request $request){


        $validator = Validator::make($request->all(),[
            'id' => 'required|numeric|unique:kabkota|min:0',
            'id_provinsi' => 'required|numeric|min:0',
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
        $pesan = "Failed Create Kabkota";
        $data = new Kabkota;

        $data->id=$request->id;
        $data->id_provinsi=$request->id_provinsi;
        $data->nama=$request->nama;
        if($data->save()){

            $kode = 201;
            $pesan = "Success Create Kabkota";
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
        $pesan = "Failed update Kabkota";



        $validator = Validator::make($request->all(),[
            'id' => 'required|numeric|unique:kabkota,id,'.$id,
            'id_provinsi' => 'required|numeric|min:0',
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
        $data = Kabkota::find($id);
        if($data){
            $data->id=$request->id;
            $data->id_provinsi=$request->id_provinsi;
            $data->nama=$request->nama;
            if($data->save()){
                $kode = 200;
                $pesan = "Success update Kabkota";
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
        $pesan = "Failed delete Kabkota";
        $data = Kabkota::find($id);
        if($data){
            if($data->delete()){
                $kode = 200;
                $pesan = "Success delete Kabkota";
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
