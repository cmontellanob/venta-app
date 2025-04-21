<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoDocumento;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoDocumento::create([
            'id' => 1,
            'nombre' => 'documento de identidad',
        ]);
        TipoDocumento::create([
            'id' => 2,
            'nombre' => 'Carnet de Extranjería',
        ]);

        TipoDocumento::create([
            'id' => 3,
            'nombre' => 'Pasaporte',
        ]);

        TipoDocumento::create([
            'id' => 4,
            'nombre' => 'Otro tipo de documento',
        ]);

        TipoDocumento::create([
            'id' => 5,
            'nombre' => 'NIT',
        ]);
    }
}
