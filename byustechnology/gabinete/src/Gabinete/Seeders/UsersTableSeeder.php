<?php

namespace ByusTechnology\Gabinete\Seeders;

use App\Models\User;
use ByusTechnology\Gabinete\Models\Prefeitura;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'name' => 'Root',
            'type' => 'root',
            'email' => 'root@gabineteagil.app.br',
            'password' => bcrypt('secret')
        ]);

        // Adicionando usuários para as prefeituras
        foreach(Prefeitura::all() as $prefeitura)
        {
            $usuario = new User;

            $usuario->name = $faker->firstName() . ' '  . $faker->lastName();
            $usuario->prefeitura_id = $prefeitura->id;
            $usuario->email = Str::slug($prefeitura->cidade . '_' . $prefeitura->estado) . '@gabineteagil.com.br';
            $usuario->type = 'admin';
            $usuario->password = bcrypt('admin');
            $usuario->save();

            // Adicionando os vereadores
            // foreach(range(1, 2) as $range) {
            //     User::firstOrCreate([
            //         'name' => $faker->firstName() . ' '  . $faker->lastName(),
            //         'prefeitura_id' => $prefeitura->id,
            //         'email' => $faker->unique()->email,
            //         'type' => 'vereador',
            //         'password' => bcrypt('secret')
            //     ]);
            // }
        }


    }
}