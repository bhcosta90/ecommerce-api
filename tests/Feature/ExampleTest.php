<?php

declare(strict_types = 1);

use App\Models\User;

use function Pest\Laravel\actingAs;

it('returns a successful response', function (): void {
    actingAs(new User());

    $response = $this->get('/');

    $response->assertStatus(200);
});
