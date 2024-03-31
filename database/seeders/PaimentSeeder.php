<?php
// $ php artisan make:seeder PaimentSeeder
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paiment;

class PaimentSeeder extends Seeder
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
                'activite_id' => 1
            ],
            [
                'famille_id' => 1,
                'activite_id' => 2
            ],
            [
                'famille_id' => 2,
                'activite_id' => 1
            ],
            [
                'famille_id' => 2,
                'activite_id' => 2
            ],
            [
                'famille_id' => 3,
                'activite_id' => 2
            ],
            [
                'famille_id' => 3,
                'activite_id' => 4
            ],
            [
                'famille_id' => 4,
                'activite_id' => 2
            ],
            [
                'famille_id' => 4,
                'activite_id' => 4
            ],
            

        ];

        foreach ($types as $type) {
            Paiment::create(array(
                'famille_id' => $type['famille_id'],
                'activite_id' => $type['activite_id']
            ));
        }
    }
}
