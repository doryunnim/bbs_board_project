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

        $faker = app(Faker\Generator::class);
        $qna_articles = App\Qna_article::all();

        $qna_articles->each(function ($article){
            $article->qna_comments()->save(factory(App\Qna_comment::class)->make());
            $article->qna_comments()->save(factory(App\Qna_comment::class)->make());
        });

        $qna_articles->each(function ($article) use ($faker){
            $commentIds = App\Qna_comment::pluck('id')->toArray();

            foreach(range(1,5) as $index) {
                $article->qna_comments()->save(
                    factory(App\Qna_comment::class)->make([
                        'parent_id' => $faker->randomElement($commentIds),
                    ])
                );
            }
        });
        $this->command->info('Seeded: qna_comments table');
    }
}
