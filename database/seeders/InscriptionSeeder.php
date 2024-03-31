<?php
// $ php artisan make:seeder InscriptionSeeder
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inscription;

class InscriptionSeeder extends Seeder
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
            // famille 1 association 1
            [
                'activite_id' => 1,
                'enfant_id' => 1,
                'date_inscription' => '2022-09-25'
            ],
            [
                'activite_id' => 2,
                'enfant_id' => 1,
                'date_inscription' => '2022-09-25'
            ],
            // famille 2 association 1
            [
                'activite_id' => 1,
                'enfant_id' => 2,
                'date_inscription' => '2022-09-24'
            ],
            [
                'activite_id' => 2,
                'enfant_id' => 2,
                'date_inscription' => '2022-09-24'
            ],
             // famille 3 association 2
            [
                'activite_id' => 3,
                'enfant_id' => 3,
                'date_inscription' => '2022-09-27'
            ],
            [
                'activite_id' => 4,
                'enfant_id' => 3,
                'date_inscription' => '2022-09-27'
            ],
             // famille 4 association 2
            [
                'activite_id' => 3,
                'enfant_id' => 4,
                'date_inscription' => '2022-09-28'
            ],
            [
                'activite_id' => 4,
                'enfant_id' => 4,
                'date_inscription' => '2022-09-28'
            ],
            // famille 5 association 3
            [
                'activite_id' => 5,
                'enfant_id' => 5,
                'date_inscription' => '2022-10-01'
            ],
            [
                'activite_id' => 6,
                'enfant_id' => 5,
                'date_inscription' => '2022-10-01'
            ],
             // famille 6 association 3
            [
                'activite_id' => 5,
                'enfant_id' => 6,
                'date_inscription' => '2022-10-02'
            ],
            [
                'activite_id' => 6,
                'enfant_id' => 6,
                'date_inscription' => '2022-10-02'
            ],
            // famille 7 association 4
            [
                'activite_id' => 7,
                'enfant_id' => 7,
                'date_inscription' => '2022-10-01'
            ],
            [
                'activite_id' => 8,
                'enfant_id' => 7,
                'date_inscription' => '2022-10-01'
            ],
            // famille 8 association 4
            [
                'activite_id' => 7,
                'enfant_id' => 8,
                'date_inscription' => '2022-10-02'
            ],
            [
                'activite_id' => 8,
                'enfant_id' => 8,
                'date_inscription' => '2022-10-02'
            ],

        ];

        foreach ($types as $type) {
            Inscription::create(array(
                'activite_id' => $type['activite_id'],
                'enfant_id' => $type['enfant_id'],
                'date_inscription' => $type['date_inscription']
            ));
        }
    }
}
