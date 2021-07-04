<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User\Commune;
use App\Models\User\Departement;
use App\Models\User;
class CommunesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ousmane Diallo',
            'email' => 'ousmanekedougou@gmail.com',
            'phone' => '77000001',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => '1',
            'isAdmin' => '1'
        ]);

        $departements = [
             'Kédougou','Salémata','Saraya'
         ];
          foreach ($departements as $dep) { 
             Departement::create([
                'name' => $dep,
                'slug' => $dep
             ]);
         }

            $communes = [
                // Les communes de kedougou 
            'Kédougou' => '1',
            'Bandafassi' => '1',
            'Fongolimbi' => '1',
            'Tomborokoto' => '1',
            'Dimboli' => '1',
            'Dindéfélo' => '1',

            // Les commune de salemata
            'Salémata' => '2',
            'Dakatéli' => '2',
            'Dar Salam' => '2',
            'Ethilo' => '2',
            'Kévoye' => '2',
            'Oubaji' => '2',

            // les commune de saraye
            'Saraya' => '3',
            'Bembou' => '3',
            'Khossanto' => '3',
            'Missirah Sirimana' => '3',
            'Sabodala' => '3',
            'Medina Bafée' => '3'

            
        ];

        foreach ($communes as $k => $v) { 
            Commune::create([
               'name' => $k,
               'departement_id' => $v,
            ]);
        }
    }
}
