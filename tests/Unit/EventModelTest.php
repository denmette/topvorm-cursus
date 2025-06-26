<?php

use App\Models\Event;

it("uses slug as route key name", function () {
    $event = Event::factory()->make();

    expect($event->getRouteKeyName())->toBe("slug");
});
