<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\FieldTypeSystem\Definitions;

use FilamentAdmin\CustomFields\Enums\ValidationRule;
use FilamentAdmin\CustomFields\FieldTypeSystem\BaseFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldSchema;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Forms\SelectComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists\SingleChoiceEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns\SingleChoiceColumn;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Filters\SelectFilter;

class SelectFieldType extends BaseFieldType
{
    public function configure(): FieldSchema
    {
        return FieldSchema::singleChoice()
            ->key('select')
            ->label('Select')
            ->icon('mdi-form-select')
            ->formComponent(SelectComponent::class)
            ->tableColumn(SingleChoiceColumn::class)
            ->tableFilter(SelectFilter::class)
            ->infolistEntry(SingleChoiceEntry::class)
            ->encryptable()
            ->priority(50)
            ->availableValidationRules([
                ValidationRule::REQUIRED,
                ValidationRule::IN,
                ValidationRule::NOT_IN,
            ])
            ->filterable();
    }
}
