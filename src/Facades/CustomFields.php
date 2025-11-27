<?php

namespace FilamentAdmin\CustomFields\Facades;

use Illuminate\Support\Facades\Facade;
use FilamentAdmin\CustomFields\Filament\Integration\Builders\ExporterBuilder;
use FilamentAdmin\CustomFields\Filament\Integration\Builders\FormBuilder;
use FilamentAdmin\CustomFields\Filament\Integration\Builders\ImporterBuilder;
use FilamentAdmin\CustomFields\Filament\Integration\Builders\InfolistBuilder;
use FilamentAdmin\CustomFields\Filament\Integration\Builders\TableBuilder;
use FilamentAdmin\CustomFields\Filament\Integration\CustomFieldsManager;

/**
 * @method static FormBuilder form()
 * @method static TableBuilder table()
 * @method static InfolistBuilder infolist()
 * @method static ImporterBuilder importer()
 * @method static ExporterBuilder exporter()
 *
 * @see CustomFieldsManager
 */
class CustomFields extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return CustomFieldsManager::class;
    }
}
