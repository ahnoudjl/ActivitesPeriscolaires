<?php
// $ php artisan make:seeder CreneauSeeder
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Creneau;

class CreneauSeeder extends Seeder
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
                'jour' => '2022-10-04',
                'debut_periode' => '10:00',
                'fin_periode' => '11:30',
                'activite_id' => 1,
            ],
            [
                'jour' => '2022-10-05',
                'debut_periode' => '10:00',
                'fin_periode' => '11:30',
                'activite_id' => 2,
            ],
            [
                'jour' => '2022-10-06',
                'debut_periode' => '10:00',
                'fin_periode' => '11:30',
                'activite_id' => 3,
            ],
            [
                'jour' => '2022-10-07',
                'debut_periode' => '10:00',
                'fin_periode' => '11:30',
                'activite_id' => 4,
            ],
            [
                'jour' => '2022-10-08',
                'debut_periode' => '10:00',
                'fin_periode' => '11:30',
                'activite_id' => 5,
            ],
            [
                'jour' => '2022-10-09',
                'debut_periode' => '10:00',
                'fin_periode' => '11:30',
                'activite_id' => 6,
            ],
            [
                'jour' => '2022-10-10',
                'debut_periode' => '10:00',
                'fin_periode' => '11:30',
                'activite_id' => 7,
            ],
            [
                'jour' => '2022-10-11',
                'debut_periode' => '10:00',
                'fin_periode' => '11:30',
                'activite_id' => 8,
            ],
            
        ];

        foreach ($types as $type) {
            Creneau::create(array(
                'jour' => $type['jour'],
                'debut_periode' => $type['debut_periode'],
                'fin_periode' => $type['fin_periode'],
                'activite_id' => $type['activite_id']
            ));
        }
    }
}
