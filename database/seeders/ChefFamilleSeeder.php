<?php
// $ php artisan make:seeder ChefFamilleSeeder
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChefFamille;

class ChefFamilleSeeder extends Seeder
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
                'famille_id' => 1,
                'user_id' => 10
            ],
            [
                'famille_id' => 2,
                'user_id' => 11
            ],
            [
                'famille_id' => 3,
                'user_id' => 12
            ],
            [
                'famille_id' => 4,
                'user_id' => 13
            ],
            [
                'famille_id' => 5,
                'user_id' => 14
            ],
            [
                'famille_id' => 6,
                'user_id' => 15
            ],
            [
                'famille_id' => 7,
                'user_id' => 16
            ],
            [
                'famille_id' => 8,
                'user_id' => 17
            ]

        ];

        foreach ($types as $type) {
            ChefFamille::create(array(
                'famille_id' => $type['famille_id'],
                'user_id' => $type['user_id']
            ));
        }
    }
}
