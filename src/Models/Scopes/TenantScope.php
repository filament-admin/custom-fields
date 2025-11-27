<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use FilamentAdmin\CustomFields\Enums\CustomFieldsFeature;
use FilamentAdmin\CustomFields\FeatureSystem\FeatureManager;
use FilamentAdmin\CustomFields\Services\TenantContextService;

class TenantScope implements Scope
{
    /**
     * @param  Builder<Model>  $builder
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (! FeatureManager::isEnabled(CustomFieldsFeature::SYSTEM_MULTI_TENANCY)) {
            return;
        }

        $tenantId = TenantContextService::getCurrentTenantId();

        if ($tenantId === null) {
            return;
        }

        $builder->where(
            config('custom-fields.database.column_names.tenant_foreign_key'),
            $tenantId
        );
    }
}
