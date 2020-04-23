<?php

use Illuminate\Database\Seeder;

class ChefsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Chefs::class, 3)->create();
    }
}
