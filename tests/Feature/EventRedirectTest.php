<?php

use App\Models\Event;
use App\Models\Link;
use Carbon\Carbon;

test('redirects to an active link of the event', function () {
    $event = Event::factory()->create([
        'name' => 'Active Event',
        'slug' => 'active-event',
        'fallback_url' => 'http://fallback.url'
    ]);
    $activeLink = Link::factory()->create([
        'event_id' => $event->id,
        'start_date' => now()->subHour(),
        'end_date' => now()->addHour(),
        'url' => 'http://active.link'
    ]);

    $response = $this->get("/event/active-event");

    $response->assertRedirect('http://active.link');
});

test('redirects to the fallback URL if no active link is found', function () {
    $event = Event::factory()->create([
        'name' => 'Fallback Event',
        'slug' => 'fallback-event',
        'fallback_url' => 'http://fallback.url'
    ]);
    $inactiveLink = Link::factory()->create([
        'event_id' => $event->id,
        'start_date' => now()->subDays(2),
        'end_date' => now()->subDay(),
        'url' => 'http://inactive.link'
    ]);

    $response = $this->get("/event/fallback-event");

    $response->assertRedirect('http://fallback.url');
});

test('returns 404 when event is missing', function () {
    $response = $this->get('/event/unknown-slug');

    $response->assertNotFound();
});
