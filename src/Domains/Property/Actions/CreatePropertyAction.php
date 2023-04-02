<?php

declare(strict_types=1);

namespace Domains\Property\Actions;

use App\Models\Property;
use Illuminate\Support\Facades\Log;
use Infrastructure\Property\Actions\CreatePropertyContract;

class CreatePropertyAction implements CreatePropertyContract
{
    public function handle(array $propertyAttributes): Property
    {
        Log::info("Second update for branch b");
        return Property::create($propertyAttributes);
    }
}
