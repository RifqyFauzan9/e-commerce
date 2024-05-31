<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(int $eventCount = 20, int $ticketCount = 5): void
    {
        // If category empty run CategorySeeder
        if (Category::count() == 0) {
            $this->call(CategorySeeder::class);
        }

        // Insert data using FakerPhp
        $faker = Factory::create();

        // Membuat event berdasarkan eventCount
        for ($i = 0; $i < $eventCount; $i++) {
            // Create event
            $event = Event::create([
                'name' => $faker->sentence(2),
                'slug' => $faker->slug(2),
                'headline' => $faker->sentence(7),
                'description' => $faker->paragraph(1),
                'start_time' => $faker->dateTimeBetween('+1month', '+6month'),
                'location' => $faker->address,
                'duration' => $faker->numberBetween(1, 10),
                'is_popular' => $faker->boolean(20),
                'category_id' => Category::inRandomOrder()->first()->id,
                'type' => $faker->randomElement(['online', 'offline'])
            ]);
            
            // Membuat ticket berdasarkan ticketCount
            for ($n = 0; $n < $ticketCount; $n++) {
                $event->tickets()->create([
                    'name' => $faker->sentence(2),
                    'price' => $faker->numberBetween(10, 100),
                    'quantity' => $faker->numberBetween(10, 100),
                    'max_buy' => $faker->numberBetween(1, 10)
                ]);
            }
        }
    }
}