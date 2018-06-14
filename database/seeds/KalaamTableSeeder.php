<?php

use App\Category;
use App\News;
use App\Slider;
use App\Tag;
use Illuminate\Database\Seeder;

class KalaamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed News with category
        factory(News::class, 200)->create()->each(function ($item) {

            $categories = factory(Category::class, rand(2, 4))->create(['category_type' => News::class])->toArray();
            $tags = factory(Tag::class, rand(2, 4))->create()->toArray();

            $item->tags()->attach(array_column($tags, 'id'));
            return $item->categories()->sync(array_column($categories, 'id'));

        });

        // Seed Slider
        factory(Slider::class, 6)->create();
    }
}
