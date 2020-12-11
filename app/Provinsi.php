<?php
namespace App;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    //
    protected $table = 'provinsi'; 
    protected $primaryKey = 'id'; 
    protected $fillable = ['nama'];

    public $incrementing = false;
    public $timestamps = false;
    

}