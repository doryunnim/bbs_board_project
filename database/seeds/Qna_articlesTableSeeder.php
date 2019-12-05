<?php

use Illuminate\Database\Seeder;

class Qna_articlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();

        $users->each(function ($user){
            $user->qna_articles()->save(
                factory(App\Qna_article::class)->make()
            );
        });
    }
}
