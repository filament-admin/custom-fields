<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use FilamentAdmin\CustomFields\Enums\CustomFieldsFeature;
use FilamentAdmin\CustomFields\FeatureSystem\FeatureManager;
use FilamentAdmin\CustomFields\Services\TenantContextService;
use Symfony\Component\HttpFoundation\Response;

class SetTenantContextMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (FeatureManager::isEnabled(CustomFieldsFeature::SYSTEM_MULTI_TENANCY)) {
            TenantContextService::setFromFilamentTenant();
        }

        return $next($request);
    }
}
