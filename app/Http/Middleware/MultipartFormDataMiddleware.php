<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Exception;
class MultipartFormDataMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if($request->isMethod('POST') || $request->isMethod('PUT')) {
            $contentType = $request->headers->get("Content-Type", "text/html");

            if(str_contains($contentType, "multipart/form-data")) {
                $parser = new ParseInputStream();
                $payload = $parser->hydrate();

                foreach($payload as $key => $value) {
                    if($value instanceof UploadedFile) {
                        $request->files->set($key, $value);
                    } else {
                        $request->request->set($key, $value);
                    }
                }
            }
        }

        return $next($request);
    }
}