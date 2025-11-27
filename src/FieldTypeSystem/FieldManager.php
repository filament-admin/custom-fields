<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\FieldTypeSystem;

use Closure;
use Filament\Support\Concerns\EvaluatesClosures;
use FilamentAdmin\CustomFields\Collections\FieldTypeCollection;
use FilamentAdmin\CustomFields\Contracts\FieldTypeDefinitionInterface;
use FilamentAdmin\CustomFields\Data\FieldTypeData;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\CheckboxFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\CheckboxListFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\ColorPickerFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\CurrencyFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\DateFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\DateTimeFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\EmailFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\FileUploadFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\LinkFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\MarkdownEditorFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\MultiSelectFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\NumberFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\PhoneFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\RadioFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\RichEditorFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\SelectFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\TagsInputFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\TextareaFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\TextFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\ToggleButtonsFieldType;
use FilamentAdmin\CustomFields\FieldTypeSystem\Definitions\ToggleFieldType;

final class FieldManager
{
    use EvaluatesClosures;

    const array DEFAULT_FIELD_TYPES = [
        TextFieldType::class,
        NumberFieldType::class,
        EmailFieldType::class,
        PhoneFieldType::class,
        LinkFieldType::class,
        TextareaFieldType::class,
        CheckboxFieldType::class,
        CheckboxListFieldType::class,
        RadioFieldType::class,
        RichEditorFieldType::class,
        MarkdownEditorFieldType::class,
        TagsInputFieldType::class,
        ColorPickerFieldType::class,
        ToggleFieldType::class,
        ToggleButtonsFieldType::class,
        CurrencyFieldType::class,
        DateFieldType::class,
        DateTimeFieldType::class,
        SelectFieldType::class,
        MultiSelectFieldType::class,
        FileUploadFieldType::class,
    ];

    /**
     * @var array<array<string, array<int, string> | string> | Closure>
     */
    private array $fieldTypes = [];

    /**
     * @var array<int, string>
     */
    private array $cachedFieldTypes;

    /**
     * @var array<string, FieldTypeDefinitionInterface>
     */
    private array $cachedInstances = [];

    /**
     * @param  array<string, array<int, string> | string> | Closure  $fieldTypes
     */
    public function register(array|Closure $fieldTypes): static
    {
        $this->fieldTypes[] = $fieldTypes;

        return $this;
    }

    /**
     * @return array<int, string>
     */
    public function getFieldTypes(): array
    {
        if (isset($this->cachedFieldTypes)) {
            return $this->cachedFieldTypes;
        }

        array_unshift($this->fieldTypes, self::DEFAULT_FIELD_TYPES);

        $allFieldTypes = [];
        foreach ($this->fieldTypes as $fieldTypes) {
            $fieldTypes = $this->evaluate($fieldTypes);

            foreach ($fieldTypes as $fieldType) {
                $allFieldTypes[] = $fieldType;
            }
        }

        // Apply field type configuration restrictions
        $fieldTypeConfiguration = config('custom-fields.field_type_configuration');

        if ($fieldTypeConfiguration instanceof FieldTypeConfigurator) {
            // Filter field types based on configuration
            $allFieldTypes = array_filter($allFieldTypes, function (string $class) use ($fieldTypeConfiguration): bool {
                /** @var FieldTypeDefinitionInterface $instance */
                $instance = new $class;
                $config   = $instance->configure();
                $data     = $config->data();

                return $fieldTypeConfiguration->isFieldTypeAllowed($data->key);
            });
        }

        $this->cachedFieldTypes = $allFieldTypes;

        return $this->cachedFieldTypes;
    }

    public function getFieldType(?string $fieldType): ?FieldTypeData
    {
        if ($fieldType === null) {
            return null;
        }

        return $this->toCollection()->firstWhere('key', $fieldType);
    }

    /**
     * Get a field type instance by key.
     */
    public function getFieldTypeInstance(string $key): ?FieldTypeDefinitionInterface
    {
        if (isset($this->cachedInstances[$key])) {
            return $this->cachedInstances[$key];
        }

        // Build collection if needed (which also caches instances)
        $this->toCollection();

        return $this->cachedInstances[$key] ?? null;
    }

    public function toCollection(): FieldTypeCollection
    {
        $fieldTypes = [];

        foreach ($this->getFieldTypes() as $fieldTypeClass) {
            /** @var FieldTypeDefinitionInterface $fieldType */
            $fieldType = new $fieldTypeClass;
            $config    = $fieldType->configure();

            $data = $config->data();

            $fieldTypes[$data->key] = $data;

            // Cache the instance
            $this->cachedInstances[$data->key] = $fieldType;
        }

        return FieldTypeCollection::make($fieldTypes)->sortBy('priority', SORT_NATURAL)->values();
    }
}
