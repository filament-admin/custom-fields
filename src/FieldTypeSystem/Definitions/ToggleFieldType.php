<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\FieldTypeSystem\Definitions;

use FilamentAdmin\CustomFields\Enums\ValidationRule;
use FilamentAdmin\CustomFields\FieldTypeSystem\BaseFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldSchema;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Forms\ToggleComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists\BooleanEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns\IconColumn;

/**
 * ABOUTME: Field type definition for Toggle fields
 * ABOUTME: Provides Toggle functionality with appropriate validation rules
 */
class ToggleFieldType extends BaseFieldType
{
    public function configure(): FieldSchema
    {
        return FieldSchema::boolean()
            ->key('toggle')
            ->label('Toggle')
            ->icon('mdi-toggle-switch')
            ->formComponent(ToggleComponent::class)
            ->tableColumn(IconColumn::class)
            ->infolistEntry(BooleanEntry::class)
            ->priority(52)
            ->availableValidationRules([
                ValidationRule::REQUIRED,
                ValidationRule::BOOLEAN,
                ValidationRule::ACCEPTED,
            ]);
    }
}
