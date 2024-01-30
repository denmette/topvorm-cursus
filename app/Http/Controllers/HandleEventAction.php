<?php

namespace App\Http\Controllers;

use App\Models\Event;

class HandleEventAction extends Controller
{

    public function __invoke(Event $event)
    {
        $currentTime = now();

        $event->load('links');
        foreach ($event->links as $link) {
            if ($currentTime->between($link->start_date, $link->end_date)) {
                return redirect($link->url);
            }
        }

        return redirect($event->fallback_url);
    }
}
