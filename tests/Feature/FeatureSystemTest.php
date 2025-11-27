<?php

declare(strict_types=1);

use FilamentAdmin\CustomFields\Enums\CustomFieldsFeature;
use FilamentAdmin\CustomFields\FeatureSystem\FeatureConfigurator;
use FilamentAdmin\CustomFields\FeatureSystem\FeatureManager;

it('configures and checks features correctly', function (): void {
    $config = FeatureConfigurator::configure()
        ->enable(
            CustomFieldsFeature::FIELD_CONDITIONAL_VISIBILITY,
            CustomFieldsFeature::UI_TABLE_COLUMNS,
            CustomFieldsFeature::SYSTEM_MANAGEMENT_INTERFACE
        )
        ->disable(
            CustomFieldsFeature::FIELD_ENCRYPTION,
            CustomFieldsFeature::SYSTEM_MULTI_TENANCY
        );

    config(['custom-fields.features' => $config]);

    expect(FeatureManager::isEnabled(CustomFieldsFeature::FIELD_CONDITIONAL_VISIBILITY))->toBeTrue();
    expect(FeatureManager::isEnabled(CustomFieldsFeature::UI_TABLE_COLUMNS))->toBeTrue();
    expect(FeatureManager::isEnabled(CustomFieldsFeature::SYSTEM_MANAGEMENT_INTERFACE))->toBeTrue();
    expect(FeatureManager::isEnabled(CustomFieldsFeature::FIELD_ENCRYPTION))->toBeFalse();
    expect(FeatureManager::isEnabled(CustomFieldsFeature::SYSTEM_MULTI_TENANCY))->toBeFalse();
});

it('handles feature enabling and disabling', function (): void {
    $config = FeatureConfigurator::configure()
        ->enable(CustomFieldsFeature::FIELD_ENCRYPTION)
        ->disable(CustomFieldsFeature::FIELD_ENCRYPTION); // Should override

    config(['custom-fields.features' => $config]);

    expect(FeatureManager::isEnabled(CustomFieldsFeature::FIELD_ENCRYPTION))->toBeFalse();
});
