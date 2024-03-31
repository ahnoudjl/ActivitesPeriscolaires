<?php
// $ php artisan make:seeder GestionnaireSeeder
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gestionnaire;

class GestionnaireSeeder extends Seeder
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
                'association_id' => 1,
                'user_id' => 6
            ],
            [
                'association_id' => 2,
                'user_id' => 7
            ],
            [
                'association_id' => 3,
                'user_id' => 8
            ],
            [
                'association_id' => 4,
                'user_id' => 9
            ]

        ];

        foreach ($types as $type) {
            Gestionnaire::create(array(
                'association_id' => $type['association_id'],
                'user_id' => $type['user_id']
            ));
        }
    }
}
