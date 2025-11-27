<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Collections;

use Illuminate\Support\Collection;
use FilamentAdmin\CustomFields\Data\FieldTypeData;

final class FieldTypeCollection extends Collection
{
    public function acceptsArbitraryValues(): static
    {
        return $this->filter(fn (FieldTypeData $fieldType): bool => $fieldType->acceptsArbitraryValues);
    }
}
