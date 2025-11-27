<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\FieldTypeSystem\Definitions;

use FilamentAdmin\CustomFields\Enums\ValidationRule;
use FilamentAdmin\CustomFields\FieldTypeSystem\BaseFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldSchema;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Forms\CheckboxListComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists\MultiChoiceEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns\MultiChoiceColumn;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Filters\SelectFilter;

/**
 * ABOUTME: Field type definition for Checkbox List fields
 * ABOUTME: Provides Checkbox List functionality with appropriate validation rules
 */
class CheckboxListFieldType extends BaseFieldType
{
    public function configure(): FieldSchema
    {
        return FieldSchema::multiChoice()
            ->key('checkbox-list')
            ->label('Checkbox List')
            ->icon('mdi-checkbox-multiple-marked')
            ->formComponent(CheckboxListComponent::class)
            ->tableColumn(MultiChoiceColumn::class)
            ->tableFilter(SelectFilter::class)
            ->infolistEntry(MultiChoiceEntry::class)
            ->priority(55)
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
