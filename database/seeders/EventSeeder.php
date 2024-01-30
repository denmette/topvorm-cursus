<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Link;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Event::truncate();
        Link::truncate();

        for ($i = 1; $i <= 5; $i++) {
            $event = Event::create([
                'name' => 'Event ' . $i,
                'slug' => 'event-' . $i,
                'fallback_url' => 'http://example.com/fallback/' . $i,
            ]);

            for ($j = 1; $j <= 3; $j++) {
                $event->links()->create([
                    'url' => 'http://example.com/form/' . $i . '/' . $j,
                    'start_date' => now()->addHours($j - 1),
                    'end_date' => now()->addHours($j),
                ]);
            }
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
