<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Forms;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\ToggleButtons;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractFormComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Forms\ConfiguresColorOptions;
use FilamentAdmin\CustomFields\Models\CustomField;

final readonly class ToggleButtonsComponent extends AbstractFormComponent
{
    use ConfiguresColorOptions;

    public function create(CustomField $customField): Field
    {
        $field = ToggleButtons::make($customField->getFieldName())->inline(false);

        // ToggleButtons only use field options, no lookup support
        $options = $customField->options->pluck('name', 'id')->all();
        $field->options($options);

        // Add color support if enabled (ToggleButtons use native colors method)
        if ($this->hasColorOptionsEnabled($customField)) {
            $colorMapping = $this->getColorMapping($customField);

            if ($colorMapping !== []) {
                $field->colors($colorMapping);
            }
        }

        return $field;
    }
}
