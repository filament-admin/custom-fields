<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Providers;

use Illuminate\Support\ServiceProvider;
use FilamentAdmin\CustomFields\Services\ValidationService;

class ValidationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ValidationService::class, fn (mixed $app): ValidationService => new ValidationService);
    }
}
