<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Concerns\Tables;

use Filament\Tables\Columns\Column;
use Illuminate\Database\Eloquent\Builder;
use FilamentAdmin\CustomFields\Models\CustomField;
use FilamentAdmin\CustomFields\QueryBuilders\ColumnSearchableQuery;

/**
 * ABOUTME: Trait providing searchable configuration for table columns.
 * ABOUTME: Standardizes search query patterns across different column types.
 */
trait ConfiguresSearchable
{
    /**
     * Configure searchable behavior for a column.
     */
    protected function configureSearchable(Column $column, CustomField $customField): Column
    {
        return $column->searchable(
            condition: $customField->settings->searchable,
            query: fn (Builder $query, string $search): Builder => (new ColumnSearchableQuery)->builder($query, $customField, $search)
        );
    }
}
