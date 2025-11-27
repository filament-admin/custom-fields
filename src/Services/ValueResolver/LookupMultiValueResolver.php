<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Services\ValueResolver;

use FilamentAdmin\CustomFields\Contracts\ValueResolvers;
use FilamentAdmin\CustomFields\Models\Contracts\HasCustomFields;
use FilamentAdmin\CustomFields\Models\CustomField;
use Throwable;

final readonly class LookupMultiValueResolver implements ValueResolvers
{
    public function __construct(private LookupResolver $lookupResolver) {}

    /**
     * @return array<int, mixed>
     *
     * @throws Throwable
     */
    public function resolve(HasCustomFields $record, CustomField $customField, bool $exportable = false): array
    {
        $value        = $record->getCustomFieldValue($customField) ?? [];
        $lookupValues = $this->lookupResolver->resolveLookupValues($value, $customField);

        return $lookupValues->isNotEmpty() ? $lookupValues->toArray() : [];
    }
}
