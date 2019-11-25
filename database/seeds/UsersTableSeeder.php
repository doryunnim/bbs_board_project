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
        App\User::create([
            'name' => "dong",
            'email' => 'dong@dong.com',
            'password' => bcrypt('dong'),
        ]);

    }
}
