<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\FieldTypeSystem\Definitions;

use FilamentAdmin\CustomFields\Enums\ValidationRule;
use FilamentAdmin\CustomFields\FieldTypeSystem\BaseFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldSchema;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Forms\DateTimeComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists\DateTimeEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns\DateTimeColumn;

class DateTimeFieldType extends BaseFieldType
{
    public function configure(): FieldSchema
    {
        return FieldSchema::dateTime()
            ->key('date-time')
            ->label('Date and Time')
            ->icon('mdi-calendar-clock')
            ->formComponent(DateTimeComponent::class)
            ->tableColumn(DateTimeColumn::class)
            ->infolistEntry(DateTimeEntry::class)
            ->priority(35)
            ->availableValidationRules([
                ValidationRule::REQUIRED,
                ValidationRule::AFTER,
                ValidationRule::AFTER_OR_EQUAL,
                ValidationRule::BEFORE,
                ValidationRule::BEFORE_OR_EQUAL,
                ValidationRule::DATE_EQUALS,
            ]);
    }
}
