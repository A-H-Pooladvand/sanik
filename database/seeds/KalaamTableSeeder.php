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
        factory(News::class, 20)->create()->each(function (News $item) {

            $categories = factory(Category::class, rand(1,2))->create(['category_type' => News::class])->pluck('id');
            $tags = factory(Tag::class, rand(2, 4))->create()->pluck('id');

            $item->tags()->attach($tags);
            return $item->categories()->sync($categories);

        });

        // Seed Slider
        factory(Slider::class, 6)->create();
    }
}
