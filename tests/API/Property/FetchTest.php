<?php

declare(strict_types=1);

namespace Tests\Api;

use function Pest\Laravel\get;

it('can fetch properties', function () {
    get(route('api.v1.property.all'))
          ->assertSuccessful()
          ->assertJson(['message' => 'Properties fetched successfully']);
})->group('property.fetch');

