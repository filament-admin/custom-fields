<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Contracts;

use Filament\Tables\Filters\BaseFilter;
use FilamentAdmin\CustomFields\Models\CustomField;

interface TableFilterInterface
{
    public function make(CustomField $customField): BaseFilter;
}
