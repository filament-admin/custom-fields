<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Infolists;

use Filament\Infolists\Components\Entry;
use Filament\Infolists\Components\TextEntry as BaseTextEntry;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractInfolistEntry;
use FilamentAdmin\CustomFields\Models\CustomField;

final class HtmlEntry extends AbstractInfolistEntry
{
    public function make(CustomField $customField): Entry
    {
        return BaseTextEntry::make($customField->getFieldName())
            ->html()
            ->label($customField->name)
            ->state(fn (mixed $record) => $record->getCustomFieldValue($customField));
    }
}
