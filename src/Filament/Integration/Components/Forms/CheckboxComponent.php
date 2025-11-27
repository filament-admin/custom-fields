<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Forms;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Field;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractFormComponent;
use FilamentAdmin\CustomFields\Models\CustomField;

final readonly class CheckboxComponent extends AbstractFormComponent
{
    public function create(CustomField $customField): Field
    {
        return Checkbox::make($customField->getFieldName())->inline(false);
    }
}
