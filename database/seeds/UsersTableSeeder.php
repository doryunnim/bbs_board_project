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
        // App\User::create([
        //     'name' => sprintf('%s %s', Str::random(3), Str::random(4)),
        //     'email' => Str::random(10) . '@example.com',
        //     'password' => bcrypt('password'),
        // ]);

        factory(App\User::class, 5)->create();
    }
}
