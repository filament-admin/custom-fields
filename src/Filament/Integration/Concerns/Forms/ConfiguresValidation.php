<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Concerns\Forms;

use Filament\Forms\Components\Field;
use FilamentAdmin\CustomFields\Models\CustomField;
use FilamentAdmin\CustomFields\Services\ValidationService;

/**
 * ABOUTME: Trait providing validation configuration for form fields.
 * ABOUTME: Standardizes how validation rules are applied to custom fields.
 */
trait ConfiguresValidation
{
    /**
     * Configure validation rules for a field.
     */
    protected function configureValidation(Field $field, CustomField $customField, ValidationService $validationService): Field
    {
        return $field
            ->required($validationService->isRequired($customField))
            ->rules($validationService->getValidationRules($customField));
    }
}
