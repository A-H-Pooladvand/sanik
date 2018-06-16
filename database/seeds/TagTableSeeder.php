<?php

use App\Album;
use App\Project;
use App\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class, 50)->create();
        factory(Album::class, 50)->create();
    }
}
