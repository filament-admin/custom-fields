<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Forms;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\TextInput;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractFormComponent;
use FilamentAdmin\CustomFields\Models\CustomField;

final readonly class EmailComponent extends AbstractFormComponent
{
    public function create(CustomField $customField): Field
    {
        $defaults = [
            'email'        => true, // Client-side validation for UX
            'maxLength'    => 255,
            'suffixIcon'   => 'heroicon-m-envelope',
            'autocomplete' => 'email',
            'type'         => 'email',
        ];

        $component = TextInput::make($customField->getFieldName());

        return $this->applySettingsToComponent($component, $defaults);
    }
}
