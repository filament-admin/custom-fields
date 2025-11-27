<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\FieldTypeSystem\Definitions;

use FilamentAdmin\CustomFields\Enums\ValidationRule;
use FilamentAdmin\CustomFields\FieldTypeSystem\BaseFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldSchema;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Forms\PhoneComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists\TextEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns\TextColumn;

/**
 * ABOUTME: Field type definition for phone number input fields
 * ABOUTME: Provides specialized phone input with formatting and international support
 */
class PhoneFieldType extends BaseFieldType
{
    public function configure(): FieldSchema
    {
        return FieldSchema::string()
            ->key('phone')
            ->label('Phone Number')
            ->icon('heroicon-o-phone')
            ->formComponent(PhoneComponent::class)
            ->tableColumn(TextColumn::class)
            ->infolistEntry(TextEntry::class)
            ->priority(16)
            ->encryptable()
            ->searchable()
            ->sortable()
            ->availableValidationRules([
                ValidationRule::REQUIRED,
                ValidationRule::MIN,
                ValidationRule::MAX,
                ValidationRule::REGEX,
                ValidationRule::STARTS_WITH,
                ValidationRule::UNIQUE,
                ValidationRule::EXISTS,
            ]);
    }
}
