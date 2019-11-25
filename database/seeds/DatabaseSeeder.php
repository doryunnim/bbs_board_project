<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        if(config('database.default') !== 'sqlite'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }

        App\User::truncate();
        $this->call(UsersTableSeeder::class);

        App\Qna_article::truncate();
        $this->call(Qna_articlesTableSeeder::class);

        if(config('database.default') !== 'sqlite'){
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
