<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Gareeva Albina',
            'email' => 'albina@gmail.com',
            'num_of_scores' => 0,
            'is_admin' => true,
            'password'=> bcrypt('test'),
        ]);

        User::factory(10)->create();
        Application::factory(10)->create();
        Category::factory(5)->create();

        foreach(Application::take(10)->get() as $application) {
            $list_of_categories = Category::inRandomOrder()->take(random_int(1,3))->get();
            $application->categories()->attach($list_of_categories);
        }
        Category::factory(5)->create();
    }
}
