<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns;

use Filament\Tables\Columns\Column as BaseColumn;
use Filament\Tables\Columns\TextColumn as BaseTextColumn;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractTableColumn;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Tables\ConfiguresColumnLabel;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Tables\ConfiguresColumnState;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Tables\ConfiguresSearchable;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Tables\ConfiguresSortable;
use FilamentAdmin\CustomFields\Models\CustomField;

final class TextColumn extends AbstractTableColumn
{
    use ConfiguresColumnLabel;
    use ConfiguresColumnState;
    use ConfiguresSearchable;
    use ConfiguresSortable;

    public function make(CustomField $customField): BaseColumn
    {
        $column = BaseTextColumn::make($customField->getFieldName());

        $this->configureLabel($column, $customField);
        $this->configureSortable($column, $customField);
        $this->configureSearchable($column, $customField);
        $this->configureState($column, $customField);

        return $column;
    }
}
