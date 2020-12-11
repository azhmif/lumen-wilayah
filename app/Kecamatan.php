<?php
namespace App;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    //
    protected $table = 'kecamatan'; 
    protected $primaryKey = 'id'; 
    protected $fillable = ['id_kabkota','nama'];

    public $incrementing = false;
    public $timestamps = false;
    public function dataKabkota(){
        return $this->belongsTo('App\Kabkota','id_kabkota','id');
    }
}