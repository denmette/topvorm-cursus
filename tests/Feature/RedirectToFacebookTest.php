<?php

test('Test base URL redirects to the Facebook page', function () {
    $response = $this->get('/');

    $response->assertStatus(302);
    $response->assertRedirect('https://www.facebook.com/Topvorm.net/');
});
