<?php

namespace FilamentAdmin\CustomFields\Observers;

use FilamentAdmin\CustomFields\Models\CustomFieldSection;

class CustomFieldSectionObserver
{
    public function deleted(CustomFieldSection $customFieldSection): void
    {
        $customFieldSection->fields()->withDeactivated()->delete();
    }
}
