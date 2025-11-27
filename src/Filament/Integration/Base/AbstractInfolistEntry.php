<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Base;

use Filament\Infolists\Components\Entry;
use FilamentAdmin\CustomFields\Contracts\InfolistComponentInterface;
use FilamentAdmin\CustomFields\Models\CustomField;

/**
 * ABOUTME: Abstract base class for infolist entry components providing common structure.
 * ABOUTME: Standardizes entry creation pattern across different entry types.
 */
abstract class AbstractInfolistEntry implements InfolistComponentInterface
{
    /**
     * Create and configure an infolist entry.
     */
    abstract public function make(CustomField $customField): Entry;
}
