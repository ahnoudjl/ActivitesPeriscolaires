<?php
// $ php artisan make:seeder ActiviteSeeder
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activite;

class ActiviteSeeder extends Seeder
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
                'titre' => 'Garderie',
                'description' => '0658956484',
                'prix' => 40,
                'capacite' => 20,
                'association_id' => 1,
            ],
            [
                'titre' => 'Dessin anime',
                'description' => '0657956484',
                'prix' => 40,
                'capacite' => 20,
                'association_id' => 1,
            ],
            [
                'titre' => 'Garderie',
                'description' => '0658956784',
                'prix' => 40,
                'capacite' => 20,
                'association_id' => 2,
            ],
            [
                'titre' => 'Dessin anime',
                'description' => '0653956484',
                'prix' => 40,
                'capacite' => 20,
                'association_id' => 2,
            ],
            [
                'titre' => 'Garderie',
                'description' => '0638956484',
                'prix' => 40,
                'capacite' => 20,
                'association_id' => 3,
            ],
            [
                'titre' => 'Dessin anime',
                'description' => '0657356484',
                'prix' => 40,
                'capacite' => 20,
                'association_id' => 3,
            ],
            [
                'titre' => 'Garderie',
                'description' => '0658756784',
                'prix' => 40,
                'capacite' => 20,
                'association_id' => 4,
            ],
            [
                'titre' => 'Dessin anime',
                'description' => '0673956484',
                'prix' => 40,
                'capacite' => 20,
                'association_id' => 4,
            ],
            
        ];

        foreach ($types as $type) {
            Activite::create(array(
                'titre' => $type['titre'],
                'description' => $type['description'],
                'prix' => $type['prix'],
                'capacite' => $type['capacite'],
                'association_id' => $type['association_id'],
            ));
        }
    }
}
