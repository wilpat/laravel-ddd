<?php

declare(strict_types=1);

namespace Tests\Api;

use App\Models\Property;
use function Pest\Laravel\post;

it('can create a property', function () {
    $propertyStub = Property::factory()->raw();
    post(route('api.v1.property.create'), $propertyStub)
          ->assertCreated()
          ->assertJson(['message' => 'Property created successfully']);

    $this->assertDatabaseHas(
        'properties',
        array_merge($propertyStub, ['address' => json_encode($propertyStub['address'])])
    );
})->group('propertycreation');
