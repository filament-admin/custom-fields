<?php

namespace FilamentAdmin\CustomFields\Tests\Fixtures\Resources\Posts\Pages;

use Filament\Resources\Pages\CreateRecord;
use FilamentAdmin\CustomFields\Tests\Fixtures\Resources\Posts\PostResource;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
}
