<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //use HasFactory;
    protected $fillable=['idmaterial','descripcion','unidadmedida','precio1'];
    

    public function Documentos(){
        return $this->belongsToMany(Documentos::class,'documentorenglon','idmaterial','idcodigo')->withPivot(['unidadmedida','cantidad','precio1'])->withTimestamps();
    }

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
