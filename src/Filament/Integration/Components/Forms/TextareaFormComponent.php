<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Forms;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\Textarea;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractFormComponent;
use FilamentAdmin\CustomFields\Models\CustomField;

final readonly class TextareaFormComponent extends AbstractFormComponent
{
    public function create(CustomField $customField): Field
    {
        return Textarea::make($customField->getFieldName())
            ->rows(3)
            ->maxLength(50000)
            ->placeholder(null);
    }
}
