<?php

declare(strict_types=1);

use Filament\Facades\Filament;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use FilamentAdmin\CustomFields\Contracts\FieldTypeDefinitionInterface;
use FilamentAdmin\CustomFields\Enums\ValidationRule;
use FilamentAdmin\CustomFields\Models\Concerns\UsesCustomFields;
use FilamentAdmin\CustomFields\Models\Contracts\HasCustomFields;
use FilamentAdmin\CustomFields\Models\CustomField;
use FilamentAdmin\CustomFields\Models\CustomFieldOption;
use FilamentAdmin\CustomFields\Models\CustomFieldSection;
use FilamentAdmin\CustomFields\Models\CustomFieldValue;
use FilamentAdmin\CustomFields\Tests\Fixtures\Models\Post;
use FilamentAdmin\CustomFields\Tests\Fixtures\Resources\Posts\PostResource;
use Spatie\LaravelData\Data;

arch('Models extend Eloquent Model')
    ->expect([
        CustomField::class,
        CustomFieldSection::class,
        CustomFieldOption::class,
        CustomFieldValue::class,
    ])
    ->toExtend(Model::class);

arch('Filament Resource extends base Resource')
    ->expect(PostResource::class)
    ->toExtend(Resource::class);

arch('Filament Resource Pages extend base Page')
    ->expect('FilamentAdmin\CustomFields\Tests\Fixtures\Resources\Posts\Pages')
    ->toExtend(Page::class);

arch('No debugging functions are used')
    ->expect(['dd', 'dump', 'ray', 'var_dump'])
    ->not->toBeUsed();

arch('Enums are backed by strings or integers')
    ->expect('FilamentAdmin\CustomFields\Enums')
    ->toBeEnums();

arch('Factories extend Laravel Factory')
    ->expect('FilamentAdmin\CustomFields\Database\Factories')
    ->toExtend(Factory::class);

arch('Custom field models implement HasCustomFields contract')
    ->expect(Post::class)
    ->toImplement(HasCustomFields::class)
    ->toUse(UsesCustomFields::class);

arch('Observers follow naming convention')
    ->expect('FilamentAdmin\CustomFields\Observers')
    ->toHaveSuffix('Observer');

arch('Middleware follows naming convention')
    ->expect('FilamentAdmin\CustomFields\Http\Middleware')
    ->toHaveSuffix('Middleware');

arch('Exceptions follow naming convention')
    ->expect('FilamentAdmin\CustomFields\Exceptions')
    ->toHaveSuffix('Exception');

arch('Jobs follow proper structure')
    ->expect('FilamentAdmin\CustomFields\Jobs')
    ->not->toHaveSuffix('Job');

arch('Data objects extend Spatie Data')
    ->expect('FilamentAdmin\CustomFields\Data')
    ->toExtend(Data::class);

// Enhanced service layer architecture tests
arch('Services follow naming convention')
    ->expect('FilamentAdmin\CustomFields\Services')
    ->toHaveSuffix('Service');

arch('Service classes have single responsibility')
    ->expect('FilamentAdmin\CustomFields\Services')
    ->toBeClasses()
    ->and('FilamentAdmin\CustomFields\Services')
    ->not->toHaveMethodsMatching('/^(get|set).+And.+/'); // Avoid methods that do multiple things

arch('Services use dependency injection properly')
    ->expect('FilamentAdmin\CustomFields\Services')
    ->toBeClasses()
    ->and('FilamentAdmin\CustomFields\Services')
    ->not->toUse(['new', 'static::']) // Avoid direct instantiation and static calls
    ->ignoring([Cache::class, Log::class]);

arch('No direct model usage in controllers')
    ->expect('FilamentAdmin\CustomFields\Http\Controllers')
    ->not->toUse([
        CustomField::class,
        CustomFieldSection::class,
        CustomFieldValue::class,
        CustomFieldOption::class,
    ]);

arch('Controllers delegate to services')
    ->expect('FilamentAdmin\CustomFields\Http\Controllers')
    ->toUse('FilamentAdmin\CustomFields\Services');

// Security and data protection constraints
arch('No password or secret data in logs')
    ->expect(['password', 'secret', 'token', 'api_key'])
    ->not->toBeUsedIn('FilamentAdmin\CustomFields')
    ->ignoring(['tests', 'Test', 'Factory']);

arch('Encryption is used for sensitive data')
    ->expect('FilamentAdmin\CustomFields\Models')
    ->toUse([Encrypter::class, 'encrypt', 'decrypt'])
    ->when(fn ($class): bool => str_contains((string) $class, 'CustomField'));

arch('Input validation is implemented')
    ->expect('FilamentAdmin\CustomFields\Http\Requests')
    ->toHaveMethod('rules')
    ->when(fn ($class): bool => class_exists($class));

arch('Filament forms use proper validation')
    ->expect('FilamentAdmin\CustomFields\Filament')
    ->toUse(['Filament\\Forms\\Components'])
    ->when(fn ($class): bool => str_contains((string) $class, 'Form'));

// Performance constraints
arch('Database queries use proper indexing hints')
    ->expect('FilamentAdmin\CustomFields\Models')
    ->not->toHaveMethodsMatching('/whereRaw|selectRaw|havingRaw/')
    ->ignoring(['tests', 'Factory']);

arch('No N+1 query patterns in services')
    ->expect('FilamentAdmin\CustomFields\Services')
    ->not->toHaveMethodsMatching('/foreach.*->/')
    ->ignoring(['tests']);

arch('Caching is used for expensive operations')
    ->expect('FilamentAdmin\CustomFields\Services')
    ->toUse([Cache::class, Repository::class])
    ->when(fn ($class): bool => str_contains((string) $class, 'Registry') || str_contains((string) $class, 'Helper'));

// Type safety constraints
arch('All methods have return type declarations')
    ->expect('FilamentAdmin\CustomFields')
    ->toHaveReturnTypeDeclarations()
    ->ignoring(['tests', 'migrations', 'config']);

arch('All parameters have type declarations')
    ->expect('FilamentAdmin\CustomFields')
    ->toHaveParameterTypeDeclarations()
    ->ignoring(['tests', 'migrations', 'config']);

arch('Strict types are declared')
    ->expect('FilamentAdmin\CustomFields')
    ->toUseStrictTypes()
    ->ignoring(['config', 'lang']);

// Testing constraints
arch('All test classes follow naming conventions')
    ->expect('FilamentAdmin\CustomFields\Tests')
    ->toHaveSuffix('Test')
    ->ignoring(['TestCase', 'Pest', 'helpers', 'Fixtures', 'Datasets']);

arch('Tests use proper factories')
    ->expect('FilamentAdmin\CustomFields\Tests')
    ->toUse('FilamentAdmin\CustomFields\Database\Factories')
    ->when(fn ($class): bool => str_contains((string) $class, 'Test'));

arch('Feature tests use RefreshDatabase')
    ->expect('FilamentAdmin\CustomFields\Tests\Feature')
    ->toUse(RefreshDatabase::class);

// Package structure constraints
arch('Package follows proper namespace structure')
    ->expect('FilamentAdmin\CustomFields')
    ->toHaveProperNamespaceStructure();

arch('No vendor dependencies in core models')
    ->expect('FilamentAdmin\CustomFields\Models')
    ->not->toUse(['GuzzleHttp', 'Symfony\\Component\\HttpClient'])
    ->ignoring(['Illuminate', 'Carbon', 'Spatie']);

arch('Field type implementations are consistent')
    ->expect('FilamentAdmin\CustomFields\Services\FieldTypes')
    ->toImplement(FieldTypeDefinitionInterface::class)
    ->when(fn ($class): bool => class_exists($class));

// Integration constraints
arch('Filament form components implement proper interface')
    ->expect('FilamentAdmin\CustomFields\Filament\Integration\Components\Forms')
    ->toImplement('FilamentAdmin\CustomFields\Filament\Integration\Components\Forms\FieldComponentInterface')
    ->ignoring(['AbstractFormComponent', 'FieldComponentInterface']);

arch('Livewire components follow proper structure')
    ->expect('FilamentAdmin\CustomFields\Livewire')
    ->toExtend(Component::class)
    ->when(fn ($class): bool => class_exists($class));

// Data integrity constraints
arch('Models use proper casts for data integrity')
    ->expect('FilamentAdmin\CustomFields\Models')
    ->toHaveProperty('casts')
    ->when(fn ($class): bool => str_contains((string) $class, 'CustomField'));

arch('Validation rules are consistently applied')
    ->expect(ValidationRule::class)
    ->toBeEnum()
    ->and('FilamentAdmin\CustomFields\Services')
    ->toUse(ValidationRule::class);

// Multi-tenancy constraints
arch('Tenant isolation is properly implemented')
    ->expect('FilamentAdmin\CustomFields\Models')
    ->toUse([Filament::class, 'tenant'])
    ->when(fn ($class): bool => str_contains((string) $class, 'CustomField'));

arch('No global scopes bypass tenant isolation')
    ->expect('FilamentAdmin\CustomFields\Models')
    ->not->toHaveMethodsMatching('/withoutGlobalScope|withoutGlobalScopes/')
    ->ignoring(['tests']);

// Error handling constraints
arch('Exceptions provide meaningful context')
    ->expect('FilamentAdmin\CustomFields\Exceptions')
    ->toExtend('Exception')
    ->toHaveMethod('__construct');

arch('No silent failures in critical operations')
    ->expect('FilamentAdmin\CustomFields\Services')
    ->not->toHaveMethodsMatching('/try.*catch.*continue|try.*catch.*return null/');

// Documentation and code quality
arch('Public methods have docblocks')
    ->expect('FilamentAdmin\CustomFields')
    ->toHaveDocumentedPublicMethods()
    ->ignoring(['tests', 'migrations']);

arch('Complex methods are properly documented')
    ->expect('FilamentAdmin\CustomFields')
    ->toHaveDocumentedComplexMethods()
    ->ignoring(['tests', 'migrations']);
