<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $user = new User();

        $user->create([
            'name' => 'Admin',
            'email' => 'admin@test.loc',
            'password' => 'password'
        ]);

        factory(App\User::class, 15)->create();
    }
}
