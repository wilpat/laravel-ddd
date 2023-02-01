<?php
declare(strict_types=1);

namespace Domains\Property\Actions;

use App\Models\Property;
use Infrastructure\Property\Actions\CreatePropertyContract;

class CreatePropertyAction implements CreatePropertyContract
{
  public function handle(array $propertyAttributes): Property
  {
    return Property::create($propertyAttributes);
  }
}