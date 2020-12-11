<?php
namespace App\Http\Controllers;

use Validator;
use App\Pengguna;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;
class AuthController extends BaseController 
{
    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    private $request;
    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request) {
        $this->request = $request;
    }
    /**
     * Create a new token.
     * 
     * @param  \App\User   $user
     * @return string
     */
    protected function jwt(Pengguna $pengguna) {
        $payload = [
            'iss' => "bearer", // Issuer of the token
            'sub' => $pengguna, // Subject of the token
            'iat' => time(), // Time when JWT was issued. 
            'exp' => time() + 60*60 // Expiration time
        ];
        
        // As you can see we are passing `JWT_SECRET` as the second parameter that will 
        // be used to decode the token in the future.
        return JWT::encode($payload, env('JWT_SECRET'));
    } 
    /**
     * Authenticate a user and return the token if the provided credentials are correct.
     * 
     * @param  \App\User   $user 
     * @return mixed
     */
    public function authenticate(Pengguna $pengguna) {
        $this->validate($this->request, [
            'username'=> 'required',
            'password'=> 'required'
        ]);
        // Find the user by email
        $user = Pengguna::where('username', $this->request->input('username'))->with('dataRole','dataPenduduk')->first();

        if (!$user) {
            // You wil probably have some sort of helpers or whatever
            // to make sure that you have the same response format for
            // differents kind of responses. But let's return the 
            // below respose for now.
            return response()->json([
                'message' => 'Username tidak tersedia',
                    'token' => null,
                    "code"=>400,
            ], 400);
        }
        // Verify the password and generate the token
        if (Hash::check($this->request->input('password'), $user->password)) {
            // if( $user->status==0){
            //     return response()->json([
            //         'message' => 'Belum ada akses.',
            //         'token' => null,
            //         "code"=>200,

            //     ], 401);
            // }
            return response()->json([
                "message"=> "Berhasil",
                'token' => $this->jwt($user),
                "code"=>200,
                
            ], 200);
        }
        // Bad Request response
        return response()->json([
            'message' => 'Username or password is wrong.',
            'token' => null,
            "code"=>400,
        ], 400);
    }
    public function reset(Pengguna $pengguna) {
        $this->validate($this->request, [
            'email'     => 'required',
            'link'     => 'required',
        ]);
        // Find the user by email
        $user = Pengguna::where('email', $this->request->input('email'))->with('dataRole','dataPenduduk')->first();
        if (!$user) {
            // You wil probably have some sort of helpers or whatever
            // to make sure that you have the same response format for
            // differents kind of responses. But let's return the 
            // below respose for now.
            return response()->json([
                'error' => 'Username does not exist.'
            ], 400);
        }
        // Verify the password and generate the token
        \Illuminate\Support\Facades\Mail::send('resetpassword',['nama' =>  $user->username, 'url' => $this->request->input('link').''.$this->jwt($user)], function($msg) { 
            $msg->to([$this->request->input('email')]); 
            $msg->from(['halo@komiteku.com']); });
            return response()->json([
                'token' => $this->jwt($user)
            ], 200);
        
    }
    public function change( ){
        
        $this->validate($this->request, [
            'uuid'=>'required',
            'password'=>'required',
        ]);

        $kode = 404;
        $pesan = "Failed change password";
        $data = Pengguna::find($this->request->input('uuid'));
        if($data){
        $data->password=Hash::make($this->request->input('password'));
            if($data->save()){
                $kode = 200;
                $pesan = "Success update password";
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