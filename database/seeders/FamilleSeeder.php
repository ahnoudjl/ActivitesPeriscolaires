<?php
// $ php artisan make:seeder FamilleSeeder
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Famille;

class FamilleSeeder extends Seeder
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
                'tel_fixe' => '0558956484',
                'tel_portable' => '0658956484',
                'tel_travail' => '0658956484',
                'remarques' => 'ok ok',
                'n_caf' => '561234M4',
                'association_id' => 1,
            ],
            [
                'tel_fixe' => '0558946484',
                'tel_portable' => '0657956484',
                'tel_travail' => '0658958484',
                'remarques' => 'ok ok ok',
                'n_caf' => '561234L4',
                'association_id' => 1,
            ],
            [
                'tel_fixe' => '0558956474',
                'tel_portable' => '0658956784',
                'tel_travail' => '0658976484',
                'remarques' => 'ok ok',
                'n_caf' => '561234E4',
                'association_id' => 2,
            ],
            [
                'tel_fixe' => '0558986484',
                'tel_portable' => '0653956484',
                'tel_travail' => '0658954484',
                'remarques' => 'ok ok ok ok',
                'n_caf' => '561234F4',
                'association_id' => 2,
            ],
            [
                'tel_fixe' => '0558953484',
                'tel_portable' => '0638956484',
                'tel_travail' => '0658356484',
                'remarques' => 'ok ok',
                'n_caf' => '561233M4',
                'association_id' => 3,
            ],
            [
                'tel_fixe' => '0553946484',
                'tel_portable' => '0657356484',
                'tel_travail' => '0638958484',
                'remarques' => 'ok ok ok',
                'n_caf' => '531234L4',
                'association_id' => 3,
            ],
            [
                'tel_fixe' => '0558756474',
                'tel_portable' => '0658756784',
                'tel_travail' => '0658776484',
                'remarques' => 'ok ok',
                'n_caf' => '561734E4',
                'association_id' => 4,
            ],
            [
                'tel_fixe' => '0558986784',
                'tel_portable' => '0673956484',
                'tel_travail' => '0658957484',
                'remarques' => 'ok ok ok ok',
                'n_caf' => '561734F4',
                'association_id' => 4,
            ],
            
        ];

        foreach ($types as $type) {
            Famille::create(array(
                'tel_fixe' => $type['tel_fixe'],
                'tel_portable' => $type['tel_portable'],
                'tel_travail' => $type['tel_travail'],
                'remarques' => $type['remarques'],
                'n_caf' => $type['n_caf'],
                'association_id' => $type['association_id'],
            ));
        }
    }
}
