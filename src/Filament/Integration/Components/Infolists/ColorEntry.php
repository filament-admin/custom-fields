<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists;

use Filament\Infolists\Components\ColorEntry as BaseColorEntry;
use Filament\Infolists\Components\Entry;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractInfolistEntry;
use FilamentAdmin\CustomFields\Models\CustomField;

final class ColorEntry extends AbstractInfolistEntry
{
    public function make(CustomField $customField): Entry
    {
        return BaseColorEntry::make($customField->getFieldName())
            ->label($customField->name)
            ->state(fn (mixed $record) => $record->getCustomFieldValue($customField));
    }
}
