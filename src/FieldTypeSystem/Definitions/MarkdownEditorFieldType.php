<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\FieldTypeSystem\Definitions;

use FilamentAdmin\CustomFields\Enums\ValidationRule;
use FilamentAdmin\CustomFields\FieldTypeSystem\BaseFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldSchema;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Forms\MarkdownEditorComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists\HtmlEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns\TextColumn;

/**
 * ABOUTME: Field type definition for Markdown Editor fields
 * ABOUTME: Provides Markdown Editor functionality with appropriate validation rules
 */
class MarkdownEditorFieldType extends BaseFieldType
{
    public function configure(): FieldSchema
    {
        return FieldSchema::text()
            ->key('markdown-editor')
            ->label('Markdown Editor')
            ->icon('mdi-language-markdown')
            ->formComponent(MarkdownEditorComponent::class)
            ->tableColumn(TextColumn::class)
            ->infolistEntry(HtmlEntry::class)
            ->priority(85)
            ->availableValidationRules([
                ValidationRule::REQUIRED,
                ValidationRule::MIN,
                ValidationRule::MAX,
            ]);
    }
}
