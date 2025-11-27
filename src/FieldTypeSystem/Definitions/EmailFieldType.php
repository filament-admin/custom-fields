<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\FieldTypeSystem\Definitions;

use FilamentAdmin\CustomFields\Enums\ValidationRule;
use FilamentAdmin\CustomFields\FieldTypeSystem\BaseFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldSchema;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Forms\EmailComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists\TextEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns\TextColumn;

/**
 * ABOUTME: Field type definition for email input fields
 * ABOUTME: Provides specialized email input with enhanced validation and formatting
 */
class EmailFieldType extends BaseFieldType
{
    public function configure(): FieldSchema
    {
        return FieldSchema::string()
            ->key('email')
            ->label('Email')
            ->icon('heroicon-o-envelope')
            ->formComponent(EmailComponent::class)
            ->tableColumn(TextColumn::class)
            ->infolistEntry(TextEntry::class)
            ->priority(15)
            ->encryptable()
            ->searchable()
            ->sortable()
            ->defaultValidationRules([ValidationRule::EMAIL])
            ->availableValidationRules([
                ValidationRule::REQUIRED,
                ValidationRule::EMAIL,
                ValidationRule::MIN,
                ValidationRule::MAX,
                ValidationRule::REGEX,
                ValidationRule::UNIQUE,
                ValidationRule::EXISTS,
            ]);
    }
}
