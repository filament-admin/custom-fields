<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Contracts;

use Filament\Infolists\Components\Entry;
use FilamentAdmin\CustomFields\Models\CustomField;

interface InfolistComponentInterface
{
    public function make(CustomField $customField): Entry;
}
