<?php

declare(strict_types=1);

namespace FilamentAdmin\CustomFields\Services\ValueResolver;

use FilamentAdmin\CustomFields\Contracts\ValueResolvers;
use FilamentAdmin\CustomFields\Models\Contracts\HasCustomFields;
use FilamentAdmin\CustomFields\Models\CustomField;

final readonly class LookupSingleValueResolver implements ValueResolvers
{
    public function __construct(private LookupResolver $lookupResolver) {}

    public function resolve(HasCustomFields $record, CustomField $customField, bool $exportable = false): string
    {
        $value       = $record->getCustomFieldValue($customField);
        $lookupValue = $this->lookupResolver->resolveLookupValues([$value], $customField)->first();

        return (string) $lookupValue;
    }
}
