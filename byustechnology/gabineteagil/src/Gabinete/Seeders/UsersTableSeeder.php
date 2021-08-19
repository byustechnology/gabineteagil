<?php

namespace ByusTechnology\Gabinete\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Executa os seeders na base 
     * de dados.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        User::firstOrCreate([
            'name' => 'Administrador', 
            'email' => 'admin@admin.com', 
            'password' => bcrypt('secret')
        ]);

        // Adicionando os vereadores
        foreach(range(1, 20) as $range) {
            User::firstOrCreate([
                'name' => $faker->name, 
                'email' => $faker->unique()->email, 
                'type' => 'vereador', 
                'password' => bcrypt('secret')
            ]);
        }
    }
}