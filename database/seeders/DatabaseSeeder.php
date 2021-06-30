<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\User\Commune;
use App\Models\User\Departement;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Ousmane Diallo',
            'email' => 'aeerk@gmail.com',
            'phone' => '77000000',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => '1',
            'isAdmin' => '1'
        ]);

          $departements = [
             'Kedougou','Salemata','Saraya'
         ];
          foreach ($departements as $dep) { 
             Departement::create([
                'name' => $dep,
                'slug' => $dep
             ]);
         }

            $communes = [
                // Les communes de kedougou 
            'Kedougou' => '1',
            'Bandafassi' => '1',
            'Fongolimbi' => '1',
            'Tomborokoto' => '1',

            // Les commune de salemata
            'Salamata' => '2',
            'Dakateli' => '2',
            'Dar Salam' => '2',
            'Ethilo' => '2',
            'Kevoye' => '2',
            'Oubaji' => '2',

            // les commune de saraye
            'Saraya' => '3',
            'Bembou' => '3',
            'Khossanto' => '3',
            'Missirah' => '3',
            
        ];

        foreach ($communes as $k => $v) { 
            Commune::create([
               'name' => $k,
               'departement_id' => $v,
            ]);
        }
    }
}
