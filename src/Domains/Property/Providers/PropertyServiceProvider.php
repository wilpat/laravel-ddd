<?php
declare(strict_types=1);

namespace Domains\Property\Providers;

use Domains\Property\Actions\CreatePropertyAction;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Property\Actions\CreatePropertyContract;

class PropertyServiceProvider extends ServiceProvider
{
  public array $bindings = [
    CreatePropertyContract::class => CreatePropertyAction::class
  ];

  public function boot(): void
  {
    
  }
}