<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Forms;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Field;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractFormComponent;
use FilamentAdmin\CustomFields\Models\CustomField;

final readonly class DateTimeComponent extends AbstractFormComponent
{
    public function create(CustomField $customField): Field
    {
        return DateTimePicker::make($customField->getFieldName())
            ->native(false)
            ->format('Y-m-d H:i:s')
            ->displayFormat('Y-m-d H:i:s')
            ->placeholder('YYYY-MM-DD HH:MM:SS');
    }
}
