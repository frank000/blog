<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //  \Illuminate\Support\Facades\DB::table('users')->insert([
       //    'name' => 'primeiro usuario',
      //      'email' => 'email@email.com',
       //     'password'=> bcrypt('secret')
       // ]);
       factory(App\User::class, 10)->create();
    }
}
