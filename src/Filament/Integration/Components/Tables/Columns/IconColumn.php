<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\IconColumn as BaseIconColumn;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractTableColumn;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Tables\ConfiguresColumnLabel;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Tables\ConfiguresSortable;
use FilamentAdmin\CustomFields\Models\Contracts\HasCustomFields;
use FilamentAdmin\CustomFields\Models\CustomField;

class IconColumn extends AbstractTableColumn
{
    use ConfiguresColumnLabel;
    use ConfiguresSortable;

    public function make(CustomField $customField): Column
    {
        $column = BaseIconColumn::make($customField->getFieldName())->boolean();

        $this->configureLabel($column, $customField);
        $this->configureSortable($column, $customField);

        $column
            ->searchable(false)
            ->getStateUsing(fn (HasCustomFields $record): mixed => $record->getCustomFieldValue($customField) ?? false);

        return $column;
    }
}
