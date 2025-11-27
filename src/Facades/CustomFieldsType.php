<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Facades;

use Closure;
use Illuminate\Support\Facades\Facade;
use FilamentAdmin\CustomFields\Collections\FieldTypeCollection;
use FilamentAdmin\CustomFields\FieldTypeSystem\FieldManager;

/**
 * @method static FieldTypeCollection toCollection()
 *
 * @see FieldManager
 */
class CustomFieldsType extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return FieldManager::class;
    }

    /**
     * @param  array<string, array<int | string, string | int> | string> | Closure  $fieldTypes
     */
    public static function register(array|Closure $fieldTypes): void
    {
        static::resolved(function (FieldManager $fieldTypeManager) use ($fieldTypes): void {
            $fieldTypeManager->register($fieldTypes);
        });
    }
}
