<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use GuzzleHttp\Promise\Create;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // this is for faker data
        Article::factory()->count(20)->create();
    }
}
