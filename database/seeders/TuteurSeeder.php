<?php
// $ php artisan make:seeder TuteurSeeder
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tuteur;

class TuteurSeeder extends Seeder
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
                'user_id' => 2
            ],
            [
                'association_id' => 2,
                'user_id' => 3
            ],
            [
                'association_id' => 3,
                'user_id' => 4
            ],
            [
                'association_id' => 4,
                'user_id' => 5
            ]

        ];

        foreach ($types as $type) {
            Tuteur::create(array(
                'association_id' => $type['association_id'],
                'user_id' => $type['user_id']
            ));
        }
    }
}
