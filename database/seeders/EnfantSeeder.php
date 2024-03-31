<?php
// $ php artisan make:seeder EnfantSeeder
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enfant;

class EnfantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // array des types pour remplir la base
        $types = [
            [
                'nom' => 'Malek1',
                'prenom' => 'haji1',
                'date_naissance' => '2000-12-11',
                'famille_id' => 1,
            ],
            [
                'nom' => 'Malek2',
                'prenom' => 'Haji2',
                'date_naissance' => '2001-10-11',
                'famille_id' => 2,
            ],
            [
                'nom' => 'Malek3',
                'prenom' => 'Haji3',
                'date_naissance' => '2001-10-11',
                'famille_id' => 3,
            ],
            [
                'nom' => 'Malek4',
                'prenom' => 'Haji4',
                'date_naissance' => '2002-10-11',
                'famille_id' => 4,
            ],
            [
                'nom' => 'Malek5',
                'prenom' => 'Haji5',
                'date_naissance' => '2000-10-11',
                'famille_id' => 5,
            ],
            [
                'nom' => 'Malek6',
                'prenom' => 'Haji6',
                'date_naissance' => '2000-10-11',
                'famille_id' => 6,
            ],
            [
                'nom' => 'Malek7',
                'prenom' => 'Haji7',
                'date_naissance' => '2003-10-11',
                'famille_id' => 7,
            ],
            [
                'nom' => 'Malek8',
                'prenom' => 'Haji8',
                'date_naissance' => '2000-10-11',
                'famille_id' => 8,
            ],
            
        ];

        foreach ($types as $type) {
            Enfant::create(array(
                'nom' => $type['nom'],
                'prenom' => $type['prenom'],
                'date_naissance' => $type['date_naissance'],
                'famille_id' => $type['famille_id']
            ));
        }
    }
}
