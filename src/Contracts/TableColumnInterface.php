<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Contracts;

use Filament\Tables\Columns\Column;
use FilamentAdmin\CustomFields\Models\CustomField;

interface TableColumnInterface
{
    public function make(CustomField $customField): Column;
}
