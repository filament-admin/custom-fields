<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns;

use Filament\Tables\Columns\Column as BaseColumn;
use Filament\Tables\Columns\TextColumn as BaseTextColumn;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractTableColumn;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Shared\ConfiguresBadgeColors;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Tables\ConfiguresColumnLabel;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Tables\ConfiguresSortable;
use FilamentAdmin\CustomFields\Models\Contracts\HasCustomFields;
use FilamentAdmin\CustomFields\Models\CustomField;
use FilamentAdmin\CustomFields\Services\ValueResolver\LookupSingleValueResolver;

final class SingleChoiceColumn extends AbstractTableColumn
{
    use ConfiguresBadgeColors;
    use ConfiguresColumnLabel;
    use ConfiguresSortable;

    public function __construct(public LookupSingleValueResolver $valueResolver) {}

    public function make(CustomField $customField): BaseColumn
    {
        $column = BaseTextColumn::make($customField->getFieldName());

        $this->configureLabel($column, $customField);
        $this->configureSortable($column, $customField);

        $column
            ->getStateUsing(fn (HasCustomFields $record): string => $this->valueResolver->resolve($record, $customField))
            ->searchable(false);

        return $this->applyBadgeColorsIfEnabled($column, $customField);
    }
}
