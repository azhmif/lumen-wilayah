<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kelurahan;
use Validator;
class KeldesController extends Controller
{
    //

    public function indexAll(){

        $data = Kelurahan::with('dataKecamatan.dataKabkota.dataProvinsi')->paginate(10);
        $kode = 200;
        $pesan = "Data Kelurahan";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function index($idKec){

        $data = Kelurahan::with('dataKecamatan.dataKabkota.dataProvinsi')->where('id_kecamatan',$idKec)->paginate(10);
        $kode = 200;
        $pesan = "Data Kelurahan";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function byProv($idProv){

        $data = Kelurahan::with('dataKecamatan.dataKabkota.dataProvinsi')->whereHas('dataKecamatan.dataKabkota', function($q) use($idProv){
            $q->where('id_provinsi',$idProv);
        })->paginate(10);
        $kode = 200;
        $pesan = "Data Kelurahan";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function byProvList($idProv){

        $data = Kelurahan::with('dataKecamatan.dataKabkota.dataProvinsi')->whereHas('dataKecamatan.dataKabkota', function($q) use($idProv){
            $q->where('id_provinsi',$idProv);
        })->get();
        $kode = 200;
        $pesan = "Data Kelurahan";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function byKab($idkab){

        $data = Kelurahan::with('dataKecamatan.dataKabkota.dataProvinsi')->whereHas('dataKecamatan', function($q) use($idkab){
            $q->where('id_kabkota',$idkab);
        })->paginate(10);
        $kode = 200;
        $pesan = "Data Kelurahan";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function byKabList($idkab){

        $data = Kelurahan::with('dataKecamatan.dataKabkota.dataProvinsi')->whereHas('dataKecamatan', function($q) use($idkab){
            $q->where('id_kabkota',$idkab);
        })->get();
        $kode = 200;
        $pesan = "Data Kelurahan";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function show($idKel){

        $data = Kelurahan::with('dataKecamatan.dataKabkota.dataProvinsi')->find($idKel);
        $kode = 200;
        $pesan = "Data Kelurahan";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function indexList($idKec){

        $data = Kelurahan::with('dataKecamatan.dataKabkota.dataProvinsi')->where('id_kecamatan',$idKec)->get();
        $kode = 200;
        $pesan = "Data Kelurahan Berdasarkan kecamatan";
        $response =[
            "message"=> $pesan,
            "results"=> $data,
            "code"=>$kode,
        ];

        return response()->json($response, $response['code']);
    }
    public function store(Request $request){


        $validator = Validator::make($request->all(),[
            'id' => 'required|numeric|unique:keldes|min:0',
            'id_kecamatan' => 'required|numeric|min:0',
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
        $pesan = "Failed Create Kelurahan";
        $data = new Kelurahan;

        $data->id=$request->id;
        $data->id_kecamatan=$request->id_kecamatan;
        $data->nama=$request->nama;
        if($data->save()){

            $kode = 201;
            $pesan = "Success Create Kelurahan";
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
        $pesan = "Failed update Kelurahan";


        $validator = Validator::make($request->all(),[
            'id' => 'required|numeric|unique:keldes,id,'.$id,
            'id_kecamatan' => 'required|numeric',
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
        $data = Kelurahan::find($id);

        if($data){

            $data->id=$request->id;
            $data->id_kecamatan=$request->id_kecamatan;
            $data->nama=$request->nama;

            if($data->save()){

                $kode = 200;
                $pesan = "Success update Kelurahan";
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
        $pesan = "Failed delete Kelurahan";
        $data = Kelurahan::find($id);
        if($data){
            if($data->delete()){
                $kode = 200;
                $pesan = "Success delete Kelurahan";
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
