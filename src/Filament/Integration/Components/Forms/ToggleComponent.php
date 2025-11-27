<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Forms;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\Toggle;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractFormComponent;
use FilamentAdmin\CustomFields\Models\CustomField;

final readonly class ToggleComponent extends AbstractFormComponent
{
    public function create(CustomField $customField): Field
    {
        return Toggle::make($customField->getFieldName())
            ->onColor('success')
            ->offColor('danger')
            ->inline(false);
    }
}
