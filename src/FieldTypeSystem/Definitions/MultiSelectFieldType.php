<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\FieldTypeSystem\Definitions;

use FilamentAdmin\CustomFields\Enums\ValidationRule;
use FilamentAdmin\CustomFields\FieldTypeSystem\BaseFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldSchema;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Forms\MultiSelectComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists\MultiChoiceEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns\MultiChoiceColumn;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Filters\SelectFilter;

/**
 * ABOUTME: Field type definition for Multi Select fields
 * ABOUTME: Provides Multi Select functionality with appropriate validation rules
 */
class MultiSelectFieldType extends BaseFieldType
{
    public function configure(): FieldSchema
    {
        return FieldSchema::multiChoice()
            ->key('multi-select')
            ->label('Multi Select')
            ->icon('mdi-form-dropdown')
            ->formComponent(MultiSelectComponent::class)
            ->tableColumn(MultiChoiceColumn::class)
            ->tableFilter(SelectFilter::class)
            ->infolistEntry(MultiChoiceEntry::class)
            ->priority(42)
            ->availableValidationRules([
                ValidationRule::REQUIRED,
                ValidationRule::ARRAY,
                ValidationRule::MIN,
                ValidationRule::MAX,
                ValidationRule::DISTINCT,
            ])
            ->filterable();
    }
}
