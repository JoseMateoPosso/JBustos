<?php

use Illuminate\Database\Seeder;
use App\Categories;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Categories::create([
            'description'   => 'Femenino',
            'type'          => 'g',
        ]);

        Categories::create([
            'description'   => 'Masculino',
            'type'          => 'g',
        ]);

        //Categoria modelo type = 'c'
        Categories::create([
            'description'   => 'Gay',
            'type'          => 'c',
        ]);

        Categories::create([
            'description'   => 'Transexual',
            'type'          => 'c',
        ]);

        Categories::create([
            'description'   => 'Pareja',
            'type'          => 'c',
        ]);

        Categories::create([
            'description'   => 'Heterosexual',
            'type'          => 'c',
        ]);

        //Categoria solicitud type = 's'
        Categories::create([
            'description'   => 'Crear Nick',
            'type'          => 's',
        ]);

        Categories::create([
            'description'   => 'Inactivar Nick',
            'type'          => 's',
        ]);

        Categories::create([
            'description'   => 'Trasladar Modelo',
            'type'          => 's',
        ]);

        Categories::create([
            'description'   => 'Inactivar Modelo',
            'type'          => 's',
        ]);

        Categories::create([
            'description'   => 'Retirar Modelo',
            'type'          => 's',
        ]);

        //Categoria página type = 'p'
        Categories::create([
            'description'   => 'Dolares',
            'type'          => 'p',
        ]);

        Categories::create([
            'description'   => 'Tokens',
            'type'          => 'p',
        ]);

        Categories::create([
            'description'   => 'Euros',
            'type'          => 'p',
        ]);

        //Categoria Ubicaciòn type = 'u'
        Categories::create([
            'description'   => 'País',
            'type'          => 'u',
        ]);

        Categories::create([
            'description'   => 'Departamento',
            'type'          => 'u',
        ]);

        Categories::create([
            'description'   => 'Ciudad',
            'type'          => 'u',
        ]);

        Categories::create([
            'description'   => 'Barrio',
            'type'          => 'u',
        ]);

        //Categoria Tipo Transacción type = 't'
        Categories::create([
            'description'   => 'Transferencia entrada',
            'type'          => 't',
        ]);

        Categories::create([
            'description'   => 'Ingreso',
            'type'          => 't',
        ]);

        Categories::create([
            'description'   => 'Egreso',
            'type'          => 't',
        ]);

        Categories::create([
            'description'   => 'Transferencia salida',
            'type'          => 't',
        ]);

        //Categoria Tipo Seguridad Social type = 'e'
        Categories::create([
            'description'   => 'EPS',
            'type'          => 'e',
        ]);

        Categories::create([
            'description'   => 'ARL',
            'type'          => 'e',
        ]);

        Categories::create([
            'description'   => 'FDP',
            'type'          => 'e',
        ]);

        Categories::create([
            'description'   => 'Banco',
            'type'          => 'e',
        ]);

        Categories::create([
            'description'   => 'Otro',
            'type'          => 'o',
        ]);
        // factory(Categories::class, 20)->create();
    }
}
