<?php

use Illuminate\Database\Seeder;

class TestimonialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create()->each(function ($user) {
            $testimonials = factory(App\Models\Testimonials::class,2)->make();

            $user->testimonial()->saveMany($testimonials);
        });
    }
}
