<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Category([
            'name' => 'Fantasy & Sci-Fi'
        ]);
        $category->save();

        $category = new \App\Category([
            'name' => 'Mystery & Suspense'
        ]);
        $category->save();

        $category = new \App\Category([
            'name' => 'Cookbooks'
        ]);
        $category->save();

        $category = new \App\Category([
            'name' => 'Health'
        ]);
        $category->save();

        $category = new \App\Category([
            'name' => 'Education'
        ]);
        $category->save();
    }
}
