<?php

declare(strict_types=1);

namespace Infrastructure\Property\Actions;

interface CreateBatchPropertiesContract
{
    public function handle(array $batchProperties): void;
}
