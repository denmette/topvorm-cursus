<?php

test('Test base URL redirects to the configured default link', function () {
    $response = $this->get('/');

    $response->assertStatus(302);
    $response->assertRedirect(config('redirect.default'));
});
