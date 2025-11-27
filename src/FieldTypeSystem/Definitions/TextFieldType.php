<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\FieldTypeSystem\Definitions;

use FilamentAdmin\CustomFields\Enums\ValidationRule;
use FilamentAdmin\CustomFields\FieldTypeSystem\BaseFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldSchema;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Forms\TextInputComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists\TextEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns\TextColumn;

/**
 * ABOUTME: Field type definition for standard text input fields
 * ABOUTME: Provides text input functionality with validation rules like min/max length
 */
class TextFieldType extends BaseFieldType
{
    public function configure(): FieldSchema
    {
        return FieldSchema::text()
            ->key('text')
            ->label('Text')
            ->icon('mdi-form-textbox')
            ->formComponent(TextInputComponent::class)
            ->tableColumn(TextColumn::class)
            ->infolistEntry(TextEntry::class)
            ->encryptable()
            ->priority(10)
            ->availableValidationRules([
                ValidationRule::REQUIRED,
                ValidationRule::MIN,
                ValidationRule::MAX,
                ValidationRule::ALPHA,
                ValidationRule::ALPHA_NUM,
                ValidationRule::ALPHA_DASH,
                ValidationRule::EMAIL,
                ValidationRule::STARTS_WITH,
                ValidationRule::ENDS_WITH,
            ]);
    }
}
