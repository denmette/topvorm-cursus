<?php

use App\Filament\AvatarProviders\BoringAvatarsProvider;
use App\Models\User;

it('generates avatar url', function () {
    $user = User::factory()->make(['name' => 'John Doe']);
    $provider = new BoringAvatarsProvider();
    $url = $provider->get($user);
    expect($url)->toContain('https://source.boringavatars.com/beam/120/');
});
