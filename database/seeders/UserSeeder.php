<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "admin";
        $user->email = "admin@udapeapi.com";
        $user->password = bcrypt("987412365");
        $user->save();

        $user->assignRole('Administrador');

        $user = new User();
        $user->name = "supervisor";
        $user->email = "supervisor@udapeapi.com";
        $user->password = bcrypt("987412365");
        $user->save();

        $user->assignRole('Supervisor');

        $user = new User();
        $user->name = "invitado";
        $user->email = "invitado@udapeapi.com";
        $user->password = bcrypt("987412365");
        $user->save();

        $user->assignRole('Invitado');
    }
}
