<?php
namespace App;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    //
    protected $table = 'keldes'; 
    protected $primaryKey = 'id'; 
    protected $fillable = ['id_kecamatan','nama'];

    public $incrementing = false;
    public $timestamps = false;
    public function dataKecamatan(){
        return $this->belongsTo('App\Kecamatan','id_kecamatan','id');
    }
}