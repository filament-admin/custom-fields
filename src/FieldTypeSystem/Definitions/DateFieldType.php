<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\FieldTypeSystem\Definitions;

use FilamentAdmin\CustomFields\Enums\ValidationRule;
use FilamentAdmin\CustomFields\FieldTypeSystem\BaseFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldSchema;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Forms\DateComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists\DateTimeEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns\DateTimeColumn;

/**
 * ABOUTME: Field type definition for Date fields
 * ABOUTME: Provides Date functionality with appropriate validation rules
 */
class DateFieldType extends BaseFieldType
{
    public function configure(): FieldSchema
    {
        return FieldSchema::date()
            ->key('date')
            ->label('Date')
            ->icon('mdi-calendar')
            ->formComponent(DateComponent::class)
            ->tableColumn(DateTimeColumn::class)
            ->infolistEntry(DateTimeEntry::class)
            ->priority(30)
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
