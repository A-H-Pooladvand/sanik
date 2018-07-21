<?php

use App\Tag;
use App\Project;
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
        factory(Category::class, 3)->create(['category_type' => Project::class])->each(function (Category $category) {
            factory(Project::class, 6)->create()->each(function (Project $project) use ($category) {
                $project->categories()->sync($category->id);
                $tags = factory(Tag::class, rand(2, 4))->create()->pluck('id');
                $project->tags()->attach($tags);
            });
        });
    }
}
