<?php

declare(strict_types = 1);

namespace Costa\Package\Controller\Traits\Support;

trait IncludeTrait
{
    protected function getIncludes(string $includes): array
    {
        return collect(explode('|', $includes))
            ->map(fn ($include) => explode(':', $include)[0]) // Remove os campos específicos
            ->filter(fn ($include) => in_array($include, $this->allowIncludes(), true))
            ->toArray();
    }

    protected function allowIncludes(): array
    {
        return [];
    }

    protected function getRouteIncludes(): array
    {
        return app()->isLocal() ? $this->allowIncludes() : [];
    }
}
