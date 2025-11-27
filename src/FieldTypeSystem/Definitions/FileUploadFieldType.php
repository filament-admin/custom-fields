<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\FieldTypeSystem\Definitions;

use FilamentAdmin\CustomFields\Enums\ValidationRule;
use FilamentAdmin\CustomFields\FieldTypeSystem\BaseFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldSchema;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Forms\FileUploadComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists\TextEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns\TextColumn;

/**
 * ABOUTME: Field type definition for file upload fields
 * ABOUTME: Provides file upload functionality with type validation and storage management
 */
class FileUploadFieldType extends BaseFieldType
{
    public function configure(): FieldSchema
    {
        return FieldSchema::string()
            ->key('file-upload')
            ->label('File Upload')
            ->icon('heroicon-o-paper-clip')
            ->formComponent(FileUploadComponent::class)
            ->tableColumn(TextColumn::class)
            ->infolistEntry(TextEntry::class)
            ->priority(17)
            ->searchable()
            ->defaultValidationRules([ValidationRule::FILE])
            ->availableValidationRules([
                ValidationRule::REQUIRED,
                ValidationRule::FILE,
                ValidationRule::MIMES,
                ValidationRule::MIMETYPES,
                ValidationRule::MAX,
            ]);
    }
}
