<?php

namespace FilamentAdmin\CustomFields\Tests\Fixtures\Resources\Posts\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use FilamentAdmin\CustomFields\Concerns\InteractsWithCustomFields;
use FilamentAdmin\CustomFields\Tests\Fixtures\Resources\Posts\PostResource;

class ListPosts extends ListRecords
{
    use InteractsWithCustomFields;

    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
