<?php

use App\Models\Event;

it('uses slug as route key', function () {
    $event = Event::factory()->make();
    expect($event->getRouteKeyName())->toBe('slug');
});
