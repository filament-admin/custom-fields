<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration;

use FilamentAdmin\CustomFields\Filament\Integration\Builders\ExporterBuilder;
use FilamentAdmin\CustomFields\Filament\Integration\Builders\FormBuilder;
use FilamentAdmin\CustomFields\Filament\Integration\Builders\ImporterBuilder;
use FilamentAdmin\CustomFields\Filament\Integration\Builders\InfolistBuilder;
use FilamentAdmin\CustomFields\Filament\Integration\Builders\TableBuilder;

final class CustomFieldsManager
{
    public function table(): TableBuilder
    {
        return new TableBuilder;
    }

    public function form(): FormBuilder
    {
        return new FormBuilder;
    }

    public function infolist(): InfolistBuilder
    {
        return new InfolistBuilder;
    }

    public function importer(): ImporterBuilder
    {
        return new ImporterBuilder;
    }

    public function exporter(): ExporterBuilder
    {
        return new ExporterBuilder;
    }
}
