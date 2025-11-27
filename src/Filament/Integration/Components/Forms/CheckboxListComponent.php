<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Forms;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Field;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractFormComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Forms\ConfiguresColorOptions;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Forms\ConfiguresLookups;
use FilamentAdmin\CustomFields\Models\CustomField;

final readonly class CheckboxListComponent extends AbstractFormComponent
{
    use ConfiguresColorOptions;
    use ConfiguresLookups;

    public function create(CustomField $customField): Field
    {
        $field = CheckboxList::make($customField->getFieldName());

        // Get options from lookup or field options
        $options = $this->getFieldOptions($customField);
        $field->options($options);

        // Add color styling if enabled (only for non-lookup fields)
        if (! $this->usesLookupType($customField) && $this->hasColorOptionsEnabled($customField)) {
            $coloredOptions = $this->getColoredOptions($customField);

            if ($coloredOptions !== []) {
                $field->descriptions(
                    $this->getColorDescriptions(array_keys($coloredOptions), $customField)
                );
            }
        }

        return $field;
    }
}
