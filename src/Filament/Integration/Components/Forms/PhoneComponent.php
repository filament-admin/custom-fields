<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Forms;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\TextInput;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractFormComponent;
use FilamentAdmin\CustomFields\Models\CustomField;

final readonly class PhoneComponent extends AbstractFormComponent
{
    public function create(CustomField $customField): Field
    {
        $defaults = [
            'tel'          => true, // Client-side hint for mobile keyboards
            'maxLength'    => 20,
            'suffixIcon'   => 'heroicon-m-phone',
            'autocomplete' => 'tel',
            'type'         => 'tel',
        ];

        $component = TextInput::make($customField->getFieldName());

        return $this->applySettingsToComponent($component, $defaults);
    }
}
