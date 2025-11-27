<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists;

use Filament\Infolists\Components\Entry;
use Filament\Infolists\Components\TextEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractInfolistEntry;
use FilamentAdmin\CustomFields\Models\CustomField;

final class DateTimeEntry extends AbstractInfolistEntry
{
    public function make(CustomField $customField): Entry
    {
        return TextEntry::make($customField->getFieldName())
            ->dateTime('Y-m-d H:i:s')
            ->placeholder('Y-m-d H:i:s')
            ->label($customField->name)
            ->state(fn (mixed $record) => $record->getCustomFieldValue($customField));
    }
}
