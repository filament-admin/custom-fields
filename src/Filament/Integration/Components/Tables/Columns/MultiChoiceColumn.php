<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Components\Tables\Columns;

use Filament\Tables\Columns\Column as BaseColumn;
use Filament\Tables\Columns\TextColumn as BaseTextColumn;
use FilamentAdmin\CustomFields\Filament\Integration\Base\AbstractTableColumn;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Shared\ConfiguresBadgeColors;
use FilamentAdmin\CustomFields\Filament\Integration\Concerns\Tables\ConfiguresColumnLabel;
use FilamentAdmin\CustomFields\Models\Contracts\HasCustomFields;
use FilamentAdmin\CustomFields\Models\CustomField;
use FilamentAdmin\CustomFields\Services\ValueResolver\LookupMultiValueResolver;

final class MultiChoiceColumn extends AbstractTableColumn
{
    use ConfiguresBadgeColors;
    use ConfiguresColumnLabel;

    public function __construct(public LookupMultiValueResolver $valueResolver) {}

    public function make(CustomField $customField): BaseColumn
    {
        $column = BaseTextColumn::make($customField->getFieldName());

        $this->configureLabel($column, $customField);

        $column
            ->sortable(false)
            ->searchable(false)
            ->getStateUsing(fn (HasCustomFields $record): array => $this->valueResolver->resolve($record, $customField));

        return $this->applyBadgeColorsIfEnabled($column, $customField);
    }
}
