<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Filament\Management\Schemas;

interface SectionFormInterface
{
    public static function entityType(string $entityType): self;
}
