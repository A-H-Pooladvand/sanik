<?php

use App\Project;
use App\Tag;
use App\Category;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed projects with categories and tags.
        factory(Project::class, 20)->create()->each(function (Project $project) {

            $categories = factory(Category::class, rand(1, 2))->create(['category_type' => Project::class])->pluck('id');
            $tags = factory(Tag::class, rand(2, 4))->create()->pluck('id');

            $project->tags()->attach($tags);
            return $project->categories()->sync($categories);

        });
    }
}
