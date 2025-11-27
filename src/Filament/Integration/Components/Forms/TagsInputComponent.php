<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Forms;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\TagsInput;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractFormComponent;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Forms\ConfiguresLookups;
use FilamentAdmin\CustomFields\Models\CustomField;

final readonly class TagsInputComponent extends AbstractFormComponent
{
    use ConfiguresLookups;

    public function create(CustomField $customField): Field
    {
        $field = TagsInput::make($customField->getFieldName());

        // Get suggestions from lookup or field options
        $suggestions = $this->getFieldOptions($customField);
        $field->suggestions($suggestions);

        return $field;
    }
}
