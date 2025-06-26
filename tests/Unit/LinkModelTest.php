<?php

use App\Models\Event;
use App\Models\Link;

it('belongs to an event', function () {
    $link = Link::factory()->create();

    expect($link->event)->toBeInstanceOf(Event::class);
});
