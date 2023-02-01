<?php
declare(strict_types=1);

namespace Domains\Property\Actions;

use App\Models\Address;
use App\Models\Property;
use Infrastructure\Property\Actions\CreatePropertyContract;

class CreatePropertyAction implements CreatePropertyContract
{
  public function handle(array $propertyAttributes): Property
  {
    $property = tap(Property::create(), function (Property $property) use ($propertyAttributes) {
      return $property->address()->create($propertyAttributes['address']);
    });
    return $property->load('address');
  }
}