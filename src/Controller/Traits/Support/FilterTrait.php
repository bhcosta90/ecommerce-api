<?php

declare(strict_types = 1);

namespace Costa\Package\Controller\Traits\Support;

use Illuminate\Database\Eloquent\Builder;

trait FilterTrait
{
    protected function getFilters(Builder $builder): void
    {

    }

    protected function allowFilters(): array
    {
        return [];
    }

    protected function getRouteFilters(): array
    {
        if (app()->isLocal()) {
            return $this->allowFilters();
        }

        return [];
    }
}
