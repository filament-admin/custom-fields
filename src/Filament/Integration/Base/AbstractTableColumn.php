<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Base;

use Filament\Tables\Columns\Column as BaseColumn;
use FilamentAdmin\CustomFields\Contracts\TableColumnInterface;
use FilamentAdmin\CustomFields\Models\CustomField;

/**
 * ABOUTME: Abstract base class for table column components providing common structure.
 * ABOUTME: Eliminates duplication across column classes by providing a consistent pattern.
 */
abstract class AbstractTableColumn implements TableColumnInterface
{
    /**
     * Create and configure a table column.
     */
    abstract public function make(CustomField $customField): BaseColumn;
}
