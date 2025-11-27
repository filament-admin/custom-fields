<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\FieldTypeSystem\Definitions;

use FilamentAdmin\CustomFields\Enums\ValidationRule;
use FilamentAdmin\CustomFields\FieldTypeSystem\BaseFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldSchema;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Forms\ToggleButtonsComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists\SingleChoiceEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns\SingleChoiceColumn;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Filters\SelectFilter;

/**
 * ABOUTME: Field type definition for Toggle Buttons fields
 * ABOUTME: Provides Toggle Buttons functionality with appropriate validation rules
 */
class ToggleButtonsFieldType extends BaseFieldType
{
    public function configure(): FieldSchema
    {
        return FieldSchema::singleChoice()
            ->key('toggle-buttons')
            ->label('Toggle Buttons')
            ->icon('mdi-toggle-switch-off-outline')
            ->formComponent(ToggleButtonsComponent::class)
            ->tableColumn(SingleChoiceColumn::class)
            ->tableFilter(SelectFilter::class)
            ->infolistEntry(SingleChoiceEntry::class)
            ->priority(53)
            ->availableValidationRules([
                ValidationRule::REQUIRED,
                ValidationRule::IN,
                ValidationRule::NOT_IN,
            ])
            ->filterable();
    }
}
