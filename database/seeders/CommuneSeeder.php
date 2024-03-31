<?php
// $ php artisan make:seeder CommuneSeeder
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commune;

class CommuneSeeder extends Seeder
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
                'titre' => 'Anthenay'
            ],
            [
                'titre' => 'Aougny'
            ],
            [
                'titre' => 'Arcis-le-Ponsart'
            ]
        ];

        foreach ($types as $type) {
            Commune::create(array(
                'titre' => $type['titre']
            ));
        }
    }
}
