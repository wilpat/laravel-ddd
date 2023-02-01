<?php

declare(strict_types=1);

namespace Infrastructure\Property\Actions;

use App\Models\Property;

interface CreatePropertyContract
{
    public function handle(array $propertyAttributes): Property;
}
