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

        User::firstOrCreate([
            'name' => 'Administrador', 
            'email' => 'admin@admin.com', 
            'password' => bcrypt('secret')
        ]);

    }
}