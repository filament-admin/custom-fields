<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Integration\Migrations;

use Illuminate\Database\Migrations\Migration;
use FilamentAdmin\CustomFields\Contracts\CustomsFieldsMigrators;

abstract class CustomFieldsMigration extends Migration
{
    protected CustomsFieldsMigrators $migrator;

    abstract public function up(): void;

    public function __construct()
    {
        $this->migrator = app(CustomsFieldsMigrators::class);
    }
}
