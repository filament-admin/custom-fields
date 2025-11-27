<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\FieldTypeSystem\Definitions;

use FilamentAdmin\CustomFields\Enums\ValidationRule;
use FilamentAdmin\CustomFields\FieldTypeSystem\BaseFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldSchema;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Forms\CheckboxComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists\BooleanEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns\IconColumn;

/**
 * ABOUTME: Field type definition for Checkbox fields
 * ABOUTME: Provides Checkbox functionality with appropriate validation rules
 */
class CheckboxFieldType extends BaseFieldType
{
    public function configure(): FieldSchema
    {
        return FieldSchema::boolean()
            ->key('checkbox')
            ->label('Checkbox')
            ->icon('mdi-checkbox-marked')
            ->formComponent(CheckboxComponent::class)
            ->tableColumn(IconColumn::class)
            ->infolistEntry(BooleanEntry::class)
            ->priority(50)
            ->availableValidationRules([
                ValidationRule::REQUIRED,
                ValidationRule::BOOLEAN,
                ValidationRule::ACCEPTED,
            ]);
    }
}
