<?php

declare(strict_types=1);

namespace Domains\Property\Actions;

use App\Models\Property;
use Domains\Property\Jobs\BatchPropertyCreation;
use Infrastructure\Property\Actions\CreateBatchPropertiesContract;

class CreateBatchPropertiesAction implements CreateBatchPropertiesContract
{
    public function handle(array $batchProperties): void
    {
        $parsedData = collect($batchProperties['properties'])->map(
            fn ($property) => array_merge(
                $property,
                [
                    'address' => json_encode($property['address']),
                    'uuid' => (new Property)->newUniqueId(),
                ]
            )
        );
        BatchPropertyCreation::dispatch(collect($parsedData));
    }
}
