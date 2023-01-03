<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable=['idcodigo','idcliente','razon_social','rfc','subtotal','iva','total'];
    
    //protected $with = ['cliente','productos'];
    
    public function cliente(){
                                        //key this tabla , key tabla cliente
        return $this->belongsTo(Cliente::class,'idcliente','idcliente');
    }


    public function productos(){
        return $this->belongsToMany(Producto::class,'documentorenglon','idcodigo','idmaterial');
        //->withPivot(['unidadmedida','cantidad','precio1']);
    }
    

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'idcodigo';
    
    //use HasFactory;


}
