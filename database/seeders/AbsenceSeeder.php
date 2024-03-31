<?php
// $ php artisan make:seeder AbsenceSeeder
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Absence;

class AbsenceSeeder extends Seeder
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
                'commentaires' => 'non justifié',
                'jour' => '2022-10-04 10:00:00'
            ],
            // famille 2 association 1
            [
                'activite_id' => 2,
                'enfant_id' => 2,
                'commentaires' => 'non justifié',
                'jour' => '2022-10-05 10:00:00'
            ],
             // famille 3 association 2
            [
                'activite_id' => 3,
                'enfant_id' => 3,
                'commentaires' => 'non justifié',
                'jour' => '2022-10-06 10:00:00'
            ],
            [
                'activite_id' => 4,
                'enfant_id' => 3,
                'commentaires' => 'non justifié',
                'jour' => '2022-10-08 10:00:00'
            ],

        ];

        foreach ($types as $type) {
            Absence::create(array(
                'activite_id' => $type['activite_id'],
                'enfant_id' => $type['enfant_id'],
                'commentaires' => $type['commentaires'],
                'jour' => $type['jour'],
            ));
        }
    }
}
