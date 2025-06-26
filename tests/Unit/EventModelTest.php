<?php

use App\Models\Event;
use App\Models\Link;

it('uses slug as route key name', function () {
    $event = Event::factory()->create();

    expect($event->getRouteKeyName())->toBe('slug');
});

it('has many links', function () {
    $event = Event::factory()->has(Link::factory()->count(2))->create();

    expect($event->links)->toHaveCount(2);
    expect($event->links->first())->toBeInstanceOf(Link::class);
});
