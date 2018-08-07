<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustTableSeeder::class);
        $this->call(AboutTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(ProjectTableSeeder::class);
        $this->call(AlbumTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(ScopeOfWorkTableSeeder::class);
    }
}
