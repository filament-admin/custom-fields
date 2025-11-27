<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Data;

use FilamentAdmin\CustomFields\Enums\VisibilityOperator;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class VisibilityConditionData extends Data
{
    public function __construct(
        public string $field_code,
        public VisibilityOperator $operator,
        public mixed $value,
    ) {}
}
