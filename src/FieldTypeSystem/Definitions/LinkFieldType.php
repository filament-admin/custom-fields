<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\FieldTypeSystem\Definitions;

use FilamentAdmin\CustomFields\Enums\ValidationRule;
use FilamentAdmin\CustomFields\FieldTypeSystem\BaseFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldSchema;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Forms\LinkComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists\TextEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns\TextColumn;

/**
 * ABOUTME: Field type definition for Link fields
 * ABOUTME: Provides Link functionality with appropriate validation rules
 */
class LinkFieldType extends BaseFieldType
{
    public function configure(): FieldSchema
    {
        return FieldSchema::text()
            ->key('link')
            ->label('Link')
            ->icon('mdi-link')
            ->formComponent(LinkComponent::class)
            ->tableColumn(TextColumn::class)
            ->infolistEntry(TextEntry::class)
            ->priority(60)
            ->availableValidationRules([
                ValidationRule::REQUIRED,
                ValidationRule::URL,
                ValidationRule::STARTS_WITH,
            ]);
    }
}
