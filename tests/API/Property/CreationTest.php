<?php

declare(strict_types=1);

namespace Tests\Api;

use App\Models\Property;
use Domains\Property\Actions\CreateBatchPropertiesAction;
use Domains\Property\Actions\CreatePropertyAction;
use Exception;
use Mockery\MockInterface;
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
})->group('property.creation');

it('catches 500 errors during property creation', function () {
    $this->mock(CreatePropertyAction::class, function (MockInterface $mock) {
        $mock->shouldReceive('handle')
              ->andThrow(
                  new Exception('We could not process this request. Please try again later.',
                      500)
              );
    });

    $propertyStub = Property::factory()->raw();
    post(route('api.v1.property.create'), $propertyStub)
          ->assertServerError()
          ->assertJson(['message' => 'We could not process this request. Please try again later.']);
})->group('property.creation');

it('can create multiple properties', function () {
    $propertyStub = Property::factory()->raw();

    $batchPropertiesStub = [
        'properties' => [
            $propertyStub,
            $propertyStub,
            $propertyStub,
        ],
    ];
    post(route('api.v1.property.batch.create'), $batchPropertiesStub)
          ->assertCreated()
          ->assertJson(['message' => 'Properties created successfully']);

    $this->assertDatabaseHas(
        'properties',
        array_merge($propertyStub, ['address' => json_encode($propertyStub['address'])])
    );
})->group('property.creation');

it('catches 500 errors during multiple property creation', function () {
    $this->mock(CreateBatchPropertiesAction::class, function (MockInterface $mock) {
        $mock->shouldReceive('handle')
              ->andThrow(
                  new Exception('We could not process this request. Please try again later.',
                      500)
              );
    });

    $propertyStub = Property::factory()->raw();
    $batchPropertiesStub = [
        'properties' => [
            $propertyStub,
            $propertyStub,
            $propertyStub,
        ],
    ];
    post(route('api.v1.property.batch.create'), $batchPropertiesStub)
          ->assertServerError()
          ->assertJson(['message' => 'We could not process this request. Please try again later.']);
})->group('property.creation');
