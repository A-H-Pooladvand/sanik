<?php

use App\About;
use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'title' => 'Lorem ipsum dolor sit amet',
            'summary' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab amet consectetur ducimus et inventore minima minus mollitia nam natus nulla, odio officiis provident reprehenderit repudiandae similique ut ',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab amet consectetur ducimus et inventore minima minus mollitia nam natus nulla, odio officiis provident reprehenderit repudiandae similique ut vel? Cum, quae.',
            'image' => 'files/_test/' . rand(1, 10) . '.jpg'
        ]);
    }
}
