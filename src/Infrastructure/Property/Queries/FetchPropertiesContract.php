<?php
declare(strict_types=1);

namespace Infrastructure\Property\Queries;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


interface FetchPropertiesContract
{
  public function handle(array $queryParams): LengthAwarePaginator;
}