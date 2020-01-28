<?php

use Illuminate\Database\Seeder;
use App\Statuses;

class StatuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Statuses::create([
            'description'   => 'Activo',
            'type'          => 'u'
        ]);

        Statuses::create([
            'description'   => 'Eliminado',
            'type'          => 'u'
        ]);

        Statuses::create([
            'description'   => 'Inactivo',
            'type'          => 'u'
        ]);

        Statuses::create([
            'description'   => 'Root',
            'type'          => 'u'
        ]);

        Statuses::create([
            'description'   => 'Bloqueado',
            'type'          => 'u'
        ]);

        // Estados de la solicitud type = 's'
        Statuses::create([
            'description'   => 'Registrada',
            'type'          => 's'
        ]);

        Statuses::create([
            'description'   => 'En proceso',
            'type'          => 's'
        ]);

        Statuses::create([
            'description'   => 'Actualizada',
            'type'          => 's'
        ]);

        Statuses::create([
            'description'   => 'Solicitud de cambios',
            'type'          => 's'
        ]);

        Statuses::create([
            'description'   => 'Finalizada',
            'type'          => 's'
        ]);

        Statuses::create([
            'description'   => 'Rechazada',
            'type'          => 's'
        ]);

        // Estados de la Infomodelo type = 'm'
        Statuses::create([
            'description'   => 'Activo sin solicitudes',
            'type'          => 'm'
        ]);

        Statuses::create([
            'description'   => 'Activo',
            'type'          => 'm'
        ]);

        Statuses::create([
            'description'   => 'Inactivo',
            'type'          => 'm'
        ]);

        Statuses::create([
            'description'   => 'Eliminado',
            'type'          => 'm'
        ]);

        Statuses::create([
            'description'   => 'Pendiente de traslado',
            'type'          => 'm'
        ]);

        Statuses::create([
            'description'   => 'Retirado',
            'type'          => 'm'
        ]);

        // Estados de la notificaciones type = 'n'

        Statuses::create([
            'description'   => 'Registrada',
            'type'          => 'n'
        ]);

        Statuses::create([
            'description'   => 'Leida',
            'type'          => 'n'
        ]);

        Statuses::create([
            'description'   => 'Eliminada',
            'type'          => 'n'
        ]);

        // Estados de la General type = 'g'

        Statuses::create([
            'description'   => 'Activo',
            'type'          => 'g'
        ]);

        Statuses::create([
            'description'   => 'Inactivo',
            'type'          => 'g'
        ]);

        Statuses::create([
            'description'   => 'Eliminado',
            'type'          => 'g'
        ]);

        // Estados de la Recibo type = 'r'

        Statuses::create([
            'description'   => 'Sin procesar',
            'type'          => 'r'
        ]);

        Statuses::create([
            'description'   => 'Procesado',
            'type'          => 'r'
        ]);
    }
}
