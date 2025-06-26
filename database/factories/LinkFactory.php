<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
use App\Models\Link;

class LinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Link::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween("-1 week", "now");
        $end = fake()->dateTimeBetween($start, "+1 week");

        return [
            "event_id" => Event::factory(),
            "url" => fake()->url(),
            "start_date" => $start,
            "end_date" => $end,
        ];
    }
}
