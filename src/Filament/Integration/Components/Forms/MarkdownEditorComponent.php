<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Forms;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\MarkdownEditor;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractFormComponent;
use FilamentAdmin\CustomFields\Models\CustomField;

final readonly class MarkdownEditorComponent extends AbstractFormComponent
{
    public function create(CustomField $customField): Field
    {
        return MarkdownEditor::make($customField->getFieldName());
    }
}
