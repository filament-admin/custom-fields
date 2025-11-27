<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Models\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use FilamentAdmin\CustomFields\Models\CustomField;
use FilamentAdmin\CustomFields\Models\CustomFieldValue;
use FilamentAdmin\CustomFields\QueryBuilders\CustomFieldQueryBuilder;

/**
 * Interface for models that have custom fields.
 *
 * @phpstan-require-extends Model
 */
interface HasCustomFields
{
    /**
     * @return CustomFieldQueryBuilder<CustomField>
     */
    public function customFields(): CustomFieldQueryBuilder;

    /**
     * @return MorphMany<CustomFieldValue, Model>
     */
    public function customFieldValues(): MorphMany;

    public function getCustomFieldValue(CustomField $customField): mixed;

    public function saveCustomFieldValue(CustomField $customField, mixed $value): void;

    /**
     * @param  array<string, mixed>  $customFields
     */
    public function saveCustomFields(array $customFields, ?Model $tenant = null): void;
}
