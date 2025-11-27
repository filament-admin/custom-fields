<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Forms;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Field;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractFormComponent;
use FilamentAdmin\CustomFields\Models\CustomField;

final readonly class ColorPickerComponent extends AbstractFormComponent
{
    public function create(CustomField $customField): Field
    {
        return ColorPicker::make($customField->getFieldName());
    }
}
