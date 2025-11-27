<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\FieldTypeSystem\Definitions;

use FilamentAdmin\CustomFields\Enums\ValidationRule;
use FilamentAdmin\CustomFields\FieldTypeSystem\BaseFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldSchema;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Forms\TagsInputComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists\MultiChoiceEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns\MultiChoiceColumn;

/**
 * ABOUTME: Field type definition for Tags Input fields
 * ABOUTME: Provides Tags Input functionality with appropriate validation rules
 */
final class TagsInputFieldType extends BaseFieldType
{
    public function configure(): FieldSchema
    {
        return FieldSchema::multiChoice()
            ->key('tags-input')
            ->label('Tags Input')
            ->icon('mdi-tag-multiple')
            ->formComponent(TagsInputComponent::class)
            ->tableColumn(MultiChoiceColumn::class)
            ->infolistEntry(MultiChoiceEntry::class)
            ->priority(70)
            ->availableValidationRules([
                ValidationRule::REQUIRED,
                ValidationRule::ARRAY,
                ValidationRule::MIN,
                ValidationRule::MAX,
                ValidationRule::DISTINCT,
            ])
            ->withArbitraryValues()
            ->importExample('tag1, tag2, tag3');
    }
}
