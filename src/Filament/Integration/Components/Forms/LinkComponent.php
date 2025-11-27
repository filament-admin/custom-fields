<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Forms;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\TextInput;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractFormComponent;
use FilamentAdmin\CustomFields\Models\CustomField;

final readonly class LinkComponent extends AbstractFormComponent
{
    public function create(CustomField $customField): Field
    {
        return TextInput::make($customField->getFieldName())
            ->url();
    }
}
