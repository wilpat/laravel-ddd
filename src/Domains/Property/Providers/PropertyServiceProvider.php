<?php
declare(strict_types=1);

namespace Domains\Property\Providers;

use Domains\Property\Actions\CreatePropertyAction;
use Domains\Property\Queries\FetchPropertiesQuery;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Property\Actions\CreatePropertyContract;
use Infrastructure\Property\Queries\FetchPropertiesContract;

class PropertyServiceProvider extends ServiceProvider
{
  public array $bindings = [
    CreatePropertyContract::class => CreatePropertyAction::class,
    FetchPropertiesContract::class => FetchPropertiesQuery::class,
  ];

  public function boot(): void
  {
    
  }
}