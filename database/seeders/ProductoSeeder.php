<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto = new Producto();
        $producto->idmaterial = "MCTUBO15";
        $producto->descripcion = "NIPLICIMBRA TUBO 15 CM X 3MT LARGO";
        $producto->unidadmedida = "MT";
        $producto->precio1 = 129.92;
        $producto->save();

        $producto1 = new Producto();
        $producto1->idmaterial ="MCTUBO20";
        $producto1->descripcion = "NIPLICIMBRA TUBO 20 CM X 3MT LARGO";
        $producto1->unidadmedida = "MT";
        $producto1->precio1 = 215.76;
        $producto1->save();

        $producto2 = new Producto();
        $producto2->idmaterial = "MCTUBO25";
        $producto2->descripcion = "NIPLICIMBRA TUBO 25 CM X 3MT LARGO";
        $producto2->unidadmedida = "MT";
        $producto2->precio1 = 295.80;
        $producto2->save();

        $producto3 = new Producto();
        $producto3->idmaterial = "MCTUBO30";
        $producto3->descripcion = "NIPLICIMBRA TUBO 30 CM X 3MT LARGO";
        $producto3->unidadmedida = "MT";
        $producto3->precio1 = 379.32;
        $producto3->save();

        $producto4 = new Producto();
        $producto4->idmaterial = "MCTUBO35";
        $producto4->descripcion = "NIPLICIMBRA TUBO 35 CM X 3MT LARGO";
        $producto4->unidadmedida = "MT";
        $producto4->precio1 = 489.52;
        $producto4->save();

        $producto5 = new Producto();
        $producto5->idmaterial = "MCTUBO40";
        $producto5->descripcion = "NIPLICIMBRA TUBO 40 CM X 3MT LARGO";
        $producto5->unidadmedida = "MT";
        $producto5->precio1 = 646.12;
        $producto5->save();

        $producto6 = new Producto();
        $producto6->idmaterial = "MCTUBO45";
        $producto6->descripcion = "NIPLICIMBRA TUBO 45 CM X 3MT LARGO";
        $producto6->unidadmedida = "MT";
        $producto6->precio1 = 774.88;
        $producto6->save();

        $producto7 = new Producto();
        $producto7->idmaterial = "MCTUBO50";
        $producto7->descripcion = "NIPLICIMBRA TUBO 50 CM X 3MT LARGO";
        $producto7->unidadmedida = "MT";
        $producto7->precio1 = 968.60;
        $producto7->save();

        $producto8 = new Producto();
        $producto8->idmaterial = "MCTUBO60";
        $producto8->descripcion = "NIPLICIMBRA TUBO 60 CM X 3MT LARGO";
        $producto8->unidadmedida = "MT";
        $producto8->precio1 = 1;425.64;
        $producto8->save();

        $producto9 = new Producto();
        $producto9->idmaterial = "PIAALU";
        $producto9->descripcion = "PINTURA AEROSOL ALUMINIO 1438213";
        $producto9->unidadmedida = "PZA";
        $producto9->precio1 = 74.09;
        $producto9->save();

        $producto10 = new Producto();
        $producto10->idmaterial = "PIABCOB";
        $producto10->descripcion = "PINTURA AEROSOL BLANCO BRILLANTE 1438203";
        $producto10->unidadmedida = "PZA";
        $producto10->precio1 = 49.50;
        $producto10->save();

        $producto11 = new Producto();
        $producto11->idmaterial = "PIABCOM";
        $producto11->descripcion = "PINTURA AEROSOL BLANCO MATE 1438205";
        $producto11->unidadmedida = "PZA";
        $producto11->precio1 = 49.50;
        $producto11->save();

        $producto12 = new Producto();
        $producto12->idmaterial = "PIANEGB";
        $producto12->descripcion = "PINTURA AEROSOL NEGRO BRILLANTE 1438204";
        $producto12->unidadmedida = "PZA";
        $producto12->precio1 = 49.50;
        $producto12->save();

        $producto13 = new Producto();
        $producto13->idmaterial = "PIANEGM";
        $producto13->descripcion = "PINTURA AEROSOL NEGRO MATE 1438206";
        $producto13->unidadmedida = "PZA";
        $producto13->precio1 = 49.50;
        $producto13->save();

        $producto14 = new Producto();
        $producto14->idmaterial = "PIAPRI";
        $producto14->descripcion = "PINTURA AEROSOL PRIMARIO 1438207";
        $producto14->unidadmedida = "PZA";
        $producto14->precio1 = 49.50;
        $producto14->save();

        $producto15 = new Producto();
        $producto15->idmaterial = "PIAROJF";
        $producto15->descripcion = "PINTURA AEROSOL ROJO FUEGO 1438218";
        $producto15->unidadmedida = "PZA";
        $producto15->precio1 = 49.50;
        $producto15->save();
    }
}
