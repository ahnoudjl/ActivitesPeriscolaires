<?php
// $ php artisan make:seeder UserSeeder
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
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
                'name' => 'admin1',
                'prenom' => 'admin1',
                'adresse' => '25 Reims, Rue 1',
                'tele' => '0622687914',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$6KPK0vtwYvrY4fFQSln2ceh2E4Y0nwMelPc2FZYBthyqXrOwtwTre', // adminadmin1
                'role_id' => 1 // admin
            ],
            [
                'name' => 'malekt',
                'prenom' => 'haji',
                'adresse' => '25 Reims, Rue 1',
                'tele' => '0654687922',
                'email' => 'malek@gmail.com',
                'password' => '$2y$10$Qr39b18htDrXXFafvhif1.I/0IpWRgiJBMDe.JWy6jfCc.up5N2zu', // tuteur1
                'role_id' => 2 // tuteur
            ],
            [
                'name' => 'tut3',
                'prenom' => 'haji',
                'adresse' => '25 Reims, Rue 1',
                'tele' => '0654682214',
                'email' => 'tut3@gmail.com',
                'password' => '$2y$10$B1c/iLY3356krBuO/lEUZuUKWZlX8FMK6z.1xovuTFODIzpqossHK', // tuteur2
                'role_id' => 2 // tuteur
            ],
            [
                'name' => 'tut4',
                'prenom' => 'haji',
                'adresse' => '25 Reims, Rue 1',
                'tele' => '0654227914',
                'email' => 'tut4@gmail.com',
                'password' => '$2y$10$6G.zsH9/UfSeSWZp6RgvROB9hlIS6YsG/dYNWPhG/4TfZw0Iw5jBW', // tuteur3
                'role_id' => 2 // tuteur
            ],
            [
                'name' => 'ahmedt',
                'prenom' => 'haji',
                'adresse' => '25 Reims, Rue 1',
                'tele' => '0654685914',
                'email' => 'ahmed@gmail.com',
                'password' => '$2y$10$RFOt2erv9K03lVmPddwDT.t.32t4qguX9h0dOy.p9j6tiF0EcxJ.2', // tuteur4
                'role_id' => 2 // tuteur
            ],
            [
                'name' => 'gestion1',
                'prenom' => 'haji',
                'adresse' => '25 Reims, Rue 1',
                'tele' => '0655687914',
                'email' => 'gest1@gmail.com',
                'password' => '$2y$10$81WnwZ7oiabB1oxBNMEXGeiGlRIyB5gHVZ1SADi0681MZkMTCTgQi', // gestionnaire1
                'role_id' => 3 // gestionnaire
            ],
            [
                'name' => 'gestion2',
                'prenom' => 'haji',
                'adresse' => '25 Reims, Rue 1',
                'tele' => '0654687954',
                'email' => 'gest2@gmail.com',
                'password' => '$2y$10$VWkKZ6bnjooGNkq4rkn9gu8B2zDyTRi3w8nFleUHrMw/84EdivzHm', // gestionnaire2
                'role_id' => 3 // gestionnaire
            ],
            [
                'name' => 'gestion3',
                'prenom' => 'haji',
                'adresse' => '25 Reims, Rue 1',
                'tele' => '0654687914',
                'email' => 'gest3@gmail.com',
                'password' => '$2y$10$gRrJJ1mcHhc0HVrHdwPh2uK4vHDunBoBoU/Reaw6ommIgLapuQu5e', // gestionnaire3
                'role_id' => 3 // gestionnaire
            ],
            [
                'name' => 'gestion4',
                'prenom' => 'haji',
                'adresse' => '25 Reims, Rue 1',
                'tele' => '0654657914',
                'email' => 'gest4@gmail.com',
                'password' => '$2y$10$592pYNDnMaUQCts.Ba..Bup1snh5Xv8ZOSoJPkFij9OxsNz4moAda', // gestionnaire4
                'role_id' => 3 // gestionnaire
            ],
            [
                'name' => 'parent1',
                'prenom' => 'haji',
                'adresse' => '25 Reims, Rue 1',
                'tele' => '0655687911',
                'email' => 'parent1@gmail.com',
                'password' => '$2y$10$FIVO4zvPPc6p2T5v2riHu.1RWS5/wFsXOUs8KHObZgNSeNH/.vKvS', // parent1
                'role_id' => 4 // parent
            ],
            [
                'name' => 'parent2',
                'prenom' => 'haji',
                'adresse' => '25 Reims, Rue 1',
                'tele' => '0611687954',
                'email' => 'parent2@gmail.com',
                'password' => '$$2y$10$Dpj1DZv4LW/rbBS4jwEO5Ou/Fdt2zfoYYImDNxg5fTQWQCH/kNhl6', // parent2
                'role_id' => 4 // parent
            ],
            [
                'name' => 'parent3',
                'prenom' => 'haji',
                'adresse' => '25 Reims, Rue 1',
                'tele' => '0654681114',
                'email' => 'parent3@gmail.com',
                'password' => '$2a$10$OBzk2bD6sLqkfeNW1egw1uhl1xqUnxIrscHjn9Uom74iku0DfS2/.', // parent3
                'role_id' => 4 // parent
            ],
            [
                'name' => 'parent4',
                'prenom' => 'haji',
                'adresse' => '25 Reims, Rue 1',
                'tele' => '0651157914',
                'email' => 'parent4@gmail.com',
                'password' => '$2a$10$OBzk2bD6sLqkfeNW1egw1uhl1xqUnxIrscHjn9Uom74iku0DfS2/.', // parent4
                'role_id' => 4 // parent
            ],
            [
                'name' => 'parent5',
                'prenom' => 'haji',
                'adresse' => '25 Reims, Rue 1',
                'tele' => '0655687915',
                'email' => 'parent5@gmail.com',
                'password' => '$2a$10$OBzk2bD6sLqkfeNW1egw1uhl1xqUnxIrscHjn9Uom74iku0DfS2/.', // parent5
                'role_id' => 4 // parent
            ],
            [
                'name' => 'parent6',
                'prenom' => 'haji',
                'adresse' => '25 Reims, Rue 1',
                'tele' => '0611667954',
                'email' => 'parent6@gmail.com',
                'password' => '$2a$10$OBzk2bD6sLqkfeNW1egw1uhl1xqUnxIrscHjn9Uom74iku0DfS2/.', // parent6
                'role_id' => 4 // parent
            ],
            [
                'name' => 'parent7',
                'prenom' => 'haji',
                'adresse' => '25 Reims, Rue 1',
                'tele' => '0654681714',
                'email' => 'parent7@gmail.com',
                'password' => '$2a$10$OBzk2bD6sLqkfeNW1egw1uhl1xqUnxIrscHjn9Uom74iku0DfS2/.', // parent7
                'role_id' => 4 // parent
            ],
            [
                'name' => 'parent8',
                'prenom' => 'haji',
                'adresse' => '25 Reims, Rue 1',
                'tele' => '0681157914',
                'email' => 'parent8@gmail.com',
                'password' => '$2a$10$OBzk2bD6sLqkfeNW1egw1uhl1xqUnxIrscHjn9Uom74iku0DfS2/.', // parent8
                'role_id' => 4 // parent
            ]


        ];


        foreach ($types as $type) {
            User::create(array(
                'name' => $type['name'],
                'prenom' => $type['prenom'],
                'adresse' => $type['adresse'],
                'tele' => $type['tele'],
                'email' => $type['email'],
                'password' => $type['password'],
                'role_id' => $type['role_id']
            ));
        }
    }
}
