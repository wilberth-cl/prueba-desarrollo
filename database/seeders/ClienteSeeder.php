<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cliente = new Cliente();
        $cliente->razon_social = "Teléfonos de México S.A.B. de C.V.";
        $cliente->rfc = "TELMEX23456TGHJ";
        $cliente->save();

        $cliente1 = new Cliente();
        $cliente1->razon_social = "BBVA Bancomer S.A.";
        $cliente1->rfc = "BBVATJ568734OKN";
        $cliente1->save();

        $cliente2 = new Cliente();
        $cliente2->razon_social = "HSBC México S. A";
        $cliente2->rfc = "HSBC356745GRFDY";
        $cliente2->save();

        $cliente3 = new Cliente();
        $cliente3->razon_social = "Wal-Mart S.A.B. de C. V.";
        $cliente3->rfc = "WALMART45678TYH";
        $cliente3->save();

        $cliente4 = new Cliente();
        $cliente4->razon_social = "McDonald's S.A";
        $cliente4->rfc = "MCDONALS6767TTR";
        $cliente4->save();

        $cliente4 = new Cliente();
        $cliente4->razon_social = "Air Europa Líneas Aéreas S.A.";
        $cliente4->rfc = "AIREURLIA5436BG";
        $cliente4->save();

    }
}

