<?php

declare(strict_types=1);

use App\Models\Property;

it('allows properties to be created', function () {
    $property = Property::factory()->create();

    expect($property->address)->toBeArray();
})->group('property');
