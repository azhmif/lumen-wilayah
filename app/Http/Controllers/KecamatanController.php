<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Kecamatan;
use Validator;

class KecamatanController extends Controller
{
    //

    public function indexAll(){

        $data = Kecamatan::with('dataKabkota.dataProvinsi')->paginate(10);
        $kode = 200;
        $pesan = "Data Kecamatan";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function index($idKabkota){

        $data = Kecamatan::with('dataKabkota.dataProvinsi')->where('id_kabkota',$idKabkota)->paginate(10);
        $kode = 200;
        $pesan = "Data Kecamatan";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function byProv($idProv){

        $data = Kecamatan::with('dataKabkota.dataProvinsi')->whereHas('dataKabkota', function($q) use($idProv){
            $q->where('id_provinsi',$idProv);
        })->paginate(10);
        $kode = 200;
        $pesan = "Data Kecamatan";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function byProvList($idProv){

        $data = Kecamatan::with('dataKabkota.dataProvinsi')->whereHas('dataKabkota', function($q) use($idProv){
            $q->where('id_provinsi',$idProv);
        })->get();
        $kode = 200;
        $pesan = "Data Kecamatan";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }

    public function show($idKecamatan){

        $data = Kecamatan::with('dataKabkota.dataProvinsi')->find($idKecamatan);
        $kode = 200;
        $pesan = "Data Kecamatan";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function indexList($idKabkota){

        $data = Kecamatan::with('dataKabkota.dataProvinsi')->where('id_kabkota',$idKabkota)->get();
        $kode = 200;
        $pesan = "Data Kecamatan Berdasarkan kabupaten";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function store(Request $request){


        $validator = Validator::make($request->all(),[
            'id' => 'required|numeric|unique:kecamatan|min:0',
            'id_kabkota' => 'required|numeric|min:0',
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
        $pesan = "Failed Create Kecamatan";
        $data = new Kecamatan;

        $data->id=$request->id;
        $data->id_kabkota=$request->id_kabkota;
        $data->nama=$request->nama;
        if($data->save()){

            $kode = 201;
            $pesan = "Success Create Kecamatan";
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
        $pesan = "Failed update Kecamatan";



        $validator = Validator::make($request->all(),[
            'id' => 'required|numeric|unique:kecamatan,id,'.$id,
            'id_kabkota' => 'required|numeric',
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
        $data = Kecamatan::find($id);
        if($data){
            $data->id=$request->id;
            $data->id_kabkota=$request->id_kabkota;
            $data->nama=$request->nama;
            if($data->save()){
                $kode = 200;
                $pesan = "Success update Kecamatan";
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
        $pesan = "Failed delete Kecamatan";
        $data = Kecamatan::find($id);
        if($data){
            if($data->delete()){
                $kode = 200;
                $pesan = "Success delete Kecamatan";
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
