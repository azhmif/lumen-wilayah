<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

 $router->get('idpf', function () {
            $html = '<html><body>'
                    . '<p>Put your html here, or generate it with your favourite '
                    . 'templating system.</p>'
                    . '</body></html>';

                    $pdf = app()->make('dompdf.wrapper');
            $pdf->loadHTML($html);
            return $pdf->download('invoice.pdf');
        });

$router->get('/key', function(){
    $key = \Illuminate\Support\Str::random(32);
    return $key;
});

$router->group(['prefix'=>'api/v1'], function() use($router){$router->group(['prefix'=>'provinsi'], function() use($router){
            $router->get('', 'ProvinsiController@index');
            $router->post('', 'ProvinsiController@index');
            $router->get('find/{id}', 'ProvinsiController@show');
            $router->get('list', 'ProvinsiController@indexList');
            $router->post('create', 'ProvinsiController@store');
            $router->patch('update/{id}', 'ProvinsiController@update');
            $router->delete('delete/{id}', 'ProvinsiController@destroy');
        });
        $router->group(['prefix'=>'kab-kota'], function() use($router){
            $router->get('', 'KabkotaController@indexAll');
            $router->get('prov/{idProvinsi}', 'KabkotaController@index');
            $router->get('find/{idKabkota}', 'KabkotaController@show');
            $router->get('prov/{idProvinsi}/list', 'KabkotaController@indexList');
            $router->post('create', 'KabkotaController@store');
            $router->patch('update/{id}', 'KabkotaController@update');
            $router->delete('delete/{id}', 'KabkotaController@destroy');
        });
        $router->group(['prefix'=>'kecamatan'], function() use($router){
            $router->get('', 'KecamatanController@indexAll');
            $router->get('kab/{idKabkota}', 'KecamatanController@index');
            $router->get('find/{idKecamatan}', 'KecamatanController@show');
            $router->get('kab/{idKabkota}/list', 'KecamatanController@indexList');
            $router->post('create', 'KecamatanController@store');
            $router->patch('update/{id}', 'KecamatanController@update');
            $router->delete('delete/{id}', 'KecamatanController@destroy');

            $router->get('prov/{idProv}', 'KecamatanController@byProv');
            $router->get('prov/{idProv}/list', 'KecamatanController@byProvList');
        });
        $router->group(['prefix'=>'keldes'], function() use($router){
            $router->get('', 'KeldesController@indexAll');
            $router->get('kec/{idKec}', 'KeldesController@index');
            $router->get('find/{idKel}', 'KeldesController@show');
            $router->get('kec/{idKec}/list', 'KeldesController@indexList');
            $router->post('create', 'KeldesController@store');
            $router->patch('update/{id}', 'KeldesController@update');
            $router->delete('delete/{id}', 'KeldesController@destroy');
            $router->get('kab/{idkab}', 'KeldesController@byKab');
            $router->get('kab/{idkab}/list', 'KeldesController@byKabList');
            $router->get('prov/{idProv}', 'KeldesController@byProv');
            $router->get('prov/{idProv}/list', 'KeldesController@byProvList');
        });


});
