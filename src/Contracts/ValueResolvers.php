<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Contracts;

use FilamentAdmin\CustomFields\Models\Contracts\HasCustomFields;
use FilamentAdmin\CustomFields\Models\CustomField;

interface ValueResolvers
{
    public function resolve(HasCustomFields $record, CustomField $customField, bool $exportable = false): mixed;
}
