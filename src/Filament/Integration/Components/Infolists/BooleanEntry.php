<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists;

use Filament\Infolists\Components\Entry;
use Filament\Infolists\Components\IconEntry as BaseIconEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractInfolistEntry;
use FilamentAdmin\CustomFields\Models\CustomField;

final class BooleanEntry extends AbstractInfolistEntry
{
    public function make(CustomField $customField): Entry
    {
        return BaseIconEntry::make($customField->getFieldName())
            ->boolean()
            ->label($customField->name)
            ->state(fn (mixed $record): bool => (bool) $record->getCustomFieldValue($customField));
    }
}
