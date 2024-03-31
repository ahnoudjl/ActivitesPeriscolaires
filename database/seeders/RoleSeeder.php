<?php
// $ php artisan make:seeder RoleSeeder
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
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
                'titre' => 'admin'
            ],
            [
                'titre' => 'tuteur'
            ],
            [
                'titre' => 'gestionnaire'
            ]
            ,
            [
                'titre' => 'parent'
            ]
        ];

        foreach ($types as $type) {
            Role::create(array(
                'titre' => $type['titre']
            ));
        }
    }
}
