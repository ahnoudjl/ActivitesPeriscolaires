<?php
// $ php artisan make:seeder AssociationSeeder
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Association;

class AssociationSeeder extends Seeder
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
                'titre' => 'Jamais seul',
                'commune_id' => 1
            ],
            [
                'titre' => 'Desert Aid',
                'commune_id' => 1
            ],
            [
                'titre' => '2 Mains',
                'commune_id' => 2
            ],
            [
                'titre' => 'Admr Reims Sud',
                'commune_id' => 3
            ]
        ];

        foreach ($types as $type) {
            Association::create(array(
                'titre' => $type['titre'],
                'commune_id' => $type['commune_id']
            ));
        }
    }
}
