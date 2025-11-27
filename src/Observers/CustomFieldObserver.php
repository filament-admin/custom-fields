<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Observers;

use FilamentAdmin\CustomFields\Models\CustomField;

class CustomFieldObserver
{
    public function deleted(CustomField $customField): void
    {
        // Delete the custom field options
        $customField->options()->delete();

        // Delete the custom field values
        $customField->values()->delete();
    }
}
