<?php
namespace App\Http\Middleware;

use Closure;
use Exception;
use App\Pengguna;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
class JwtMiddleware
{
    public function bearerToken()
    {
        $header = $this->header('Authorization', '');
        if (Str::startsWith($header, 'Bearer ')) {
                    return Str::substr($header, 7);
        }
    }
    public function handle($request, Closure $next, $guard = null)
    {
        $token = $request->bearerToken();

        if(!$token) {
            // Unauthorized response if token not there
            return response()->json([
                "message"=> "Token not provided.",
                "results"=> null,
                "code"=>401,
                // 'error' => 'Token not provided.'
            ], 401);
        }
        try {
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        } catch(ExpiredException $e) {
            return response()->json([
                "message"=> "Provided token is expired.",
                "results"=> null,
                "code"=>400,
                // 'error' => 'Provided token is expired.'
            ], 400);
        } catch(Exception $e) {
            return response()->json([
                "message"=> "An error while decoding token.",
                "results"=> null,
                "code"=>400,
                // 'error' => 'An error while decoding token.'
            ], 400);
        }
        $user = Pengguna::where('uuid',$credentials->sub->uuid)->with('dataRole');
        // Now let's put the user in the request class so that you can grab it from there
        $request->auth = $user;
        return $next($request);
    }
}