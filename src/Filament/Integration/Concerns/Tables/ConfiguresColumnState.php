<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Concerns\Tables;

use Filament\Tables\Columns\Column;
use FilamentAdmin\CustomFields\Models\Contracts\HasCustomFields;
use FilamentAdmin\CustomFields\Models\CustomField;

/**
 * ABOUTME: Trait providing state retrieval configuration for table columns.
 * ABOUTME: Standardizes how columns retrieve custom field values from records.
 */
trait ConfiguresColumnState
{
    /**
     * Configure state retrieval for a column.
     */
    protected function configureState(Column $column, CustomField $customField): Column
    {
        return $column->getStateUsing(
            fn (HasCustomFields $record): mixed => $record->getCustomFieldValue($customField)
        );
    }
}
