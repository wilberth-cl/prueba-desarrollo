<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'idcodigo';
    
    //use HasFactory;

    protected $fillable=['idcodigo','idcliente','razon_social','rfc','subtotal','iva','total'];
    
    public function productos(){
        return $this->belongsToMany(Producto::class,'documentorenglon','idcodigo','idmaterial')->withPivot(['unidadmedida','cantidad','precio1']);
    }



}
