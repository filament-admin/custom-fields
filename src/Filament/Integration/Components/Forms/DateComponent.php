<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Forms;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Field;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractFormComponent;
use FilamentAdmin\CustomFields\Models\CustomField;

final readonly class DateComponent extends AbstractFormComponent
{
    public function create(CustomField $customField): Field
    {
        return DatePicker::make($customField->getFieldName())
            ->native(false)
            ->format('Y-m-d')
            ->displayFormat('Y-m-d')
            ->placeholder('YYYY-MM-DD');
    }
}
