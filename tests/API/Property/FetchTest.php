<?php

declare(strict_types=1);

namespace Tests\Api;

use Domains\Property\Queries\FetchPropertiesQuery;
use Exception;
use Mockery\MockInterface;
use function Pest\Laravel\get;

it('can fetch properties', function () {
    get(route('api.v1.property.all'))
          ->assertSuccessful()
          ->assertJson(['message' => 'Properties fetched successfully']);
})->group('property.fetch');

it('catches 500 errors during property fetch', function () {
    $this->mock(FetchPropertiesQuery::class, function (MockInterface $mock) {
        $mock->shouldReceive('handle')
              ->andThrow(
                  new Exception('We could not process this request. Please try again later.',
                      500)
              );
    });

    get(route('api.v1.property.all'))
          ->assertServerError()
          ->assertJson(['message' => 'We could not process this request. Please try again later.']);
})->group('property.fetch');
