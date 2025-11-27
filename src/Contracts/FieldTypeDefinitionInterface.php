<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Contracts;

use FilamentAdmin\CustomFields\Data\FieldTypeData;
use FilamentAdmin\CustomFields\FieldTypeSystem\BaseFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldSchema;

/**
 * Contract for defining custom field types that can be registered dynamically.
 *
 * @property-read FieldTypeData $data Field type configuration data with full type hints
 *
 * @phpstan-require-extends BaseFieldType
 */
interface FieldTypeDefinitionInterface
{
    /**
     * Configure the field type capabilities and behaviors.
     * This method provides a fluent API for defining all field type characteristics.
     */
    public function configure(): FieldSchema;
}
