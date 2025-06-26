<?php

use App\Models\Event;
use App\Models\Link;

it("uses slug as route key name", function () {
    $event = Event::factory()->make();

    expect($event->getRouteKeyName())->toBe("slug");
});
