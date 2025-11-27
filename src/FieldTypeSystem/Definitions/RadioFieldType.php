<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\FieldTypeSystem\Definitions;

use FilamentAdmin\CustomFields\Enums\ValidationRule;
use FilamentAdmin\CustomFields\FieldTypeSystem\BaseFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldSchema;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Forms\RadioComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists\SingleChoiceEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns\SingleChoiceColumn;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Filters\SelectFilter;

/**
 * ABOUTME: Field type definition for Radio fields
 * ABOUTME: Provides Radio functionality with appropriate validation rules
 */
class RadioFieldType extends BaseFieldType
{
    public function configure(): FieldSchema
    {
        return FieldSchema::singleChoice()
            ->key('radio')
            ->label('Radio')
            ->icon('mdi-radiobox-marked')
            ->formComponent(RadioComponent::class)
            ->tableColumn(SingleChoiceColumn::class)
            ->tableFilter(SelectFilter::class)
            ->infolistEntry(SingleChoiceEntry::class)
            ->priority(45)
            ->availableValidationRules([
                ValidationRule::REQUIRED,
                ValidationRule::IN,
                ValidationRule::NOT_IN,
            ])
            ->filterable();
    }
}
