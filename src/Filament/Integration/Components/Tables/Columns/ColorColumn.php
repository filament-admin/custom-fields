<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns;

use Filament\Tables\Columns\ColorColumn as BaseColorColumn;
use Filament\Tables\Columns\Column as BaseColumn;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractTableColumn;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Tables\ConfiguresColumnLabel;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Tables\ConfiguresColumnState;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Tables\ConfiguresSearchable;
use FilamentAdmin\CustomFields\Models\CustomField;

final class ColorColumn extends AbstractTableColumn
{
    use ConfiguresColumnLabel;
    use ConfiguresColumnState;
    use ConfiguresSearchable;

    public function make(CustomField $customField): BaseColumn
    {
        $column = BaseColorColumn::make($customField->getFieldName());

        $this->configureLabel($column, $customField);
        $this->configureSearchable($column, $customField);
        $this->configureState($column, $customField);

        return $column;
    }
}
