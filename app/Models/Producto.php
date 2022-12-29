<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //use HasFactory;
    protected $fillable=['idmaterial','descripcion','unidadmedida','precio1'];
    

    /* public function documentos(){
        return $this->belongsToMany(Documento::class,'documentorenglon','idmaterial','idcodigo')->withPivot('unidadmedida','cantidad','precio1');
    } */
     

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'idmaterial';


    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';
}
