<?php
declare(strict_types=1);

namespace Domains\Property\Queries;

use App\Models\Property;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Infrastructure\Property\Queries\FetchPropertiesContract;

class FetchPropertiesQuery implements FetchPropertiesContract
{
  public function handle(array $queryParams): LengthAwarePaginator
  {
    return Property::query()
              ->paginate(15)
              ->withQueryString();
  }
}