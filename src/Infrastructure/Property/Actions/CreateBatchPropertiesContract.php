<?php
declare(strict_types=1);

namespace Infrastructure\Property\Actions;

use App\Models\Property;

interface CreateBatchPropertiesContract
{
  public function handle(array $batchProperties): void;
}
