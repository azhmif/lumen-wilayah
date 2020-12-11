<?php
namespace App;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Kabkota extends Model
{
    //
    protected $table = 'kabkota'; 
    protected $primaryKey = 'id'; 
    protected $fillable = ['id_provinsi','nama'];

    public $incrementing = false;
    public $timestamps = false;
    public function dataProvinsi(){
        return $this->belongsTo('App\Provinsi','id_provinsi','id');
    }
}