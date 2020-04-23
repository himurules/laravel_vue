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

        $categories = factory(App\Models\Categories::class, 6)->create();

        factory(App\Models\FoodItem::class, 14)->create();

        App\Models\FoodItem::all()->each(function ($foodItem) use ($categories) {
            $foodItem->categories()->attach(
                $categories->random(rand(1,6))->pluck('id')->toArray()
            );
        });
    }
}
