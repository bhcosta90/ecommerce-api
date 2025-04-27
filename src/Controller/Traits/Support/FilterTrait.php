<?php

declare(strict_types = 1);

namespace Costa\Package\Controller\Traits\Support;

use Illuminate\Database\Eloquent\Builder;

trait FilterTrait
{
    abstract protected function model(): string;

    protected function getFilters(Builder $builder, array $filters): void
    {
        $model      = $this->model();
        $classModel = new $model();
        $tableName  = $classModel->getTable();

        foreach ($this->allowFilters() as $key => $value) {
            if (blank($value)) {
                continue;
            }

            [$validFilter, $scope] = $this->determineFilter($key, $value);

            if (!array_key_exists($validFilter, $filters)) {
                continue;
            }

            $scope
                ? $this->applyScopedFilter($builder, $classModel, $validFilter, $filters[$validFilter])
                : $this->applyDirectFilter($builder, $tableName, $validFilter, $value, $filters[$validFilter]);

        }
    }

    protected function allowFilters(): array
    {
        return [];
    }

    protected function getRouteFilters(): array
    {
        return app()->isLocal() ? $this->allowFilters() : [];
    }

    private function applyScopedFilter(Builder $builder, $classModel, string $validFilter, string $filterValue): void
    {
        $nameFilter = str("by_{$validFilter}")->camel()->toString();
        $nameScoped = str("scope_by_{$validFilter}")->camel()->toString();

        if (!method_exists($classModel, $nameScoped) && !method_exists($classModel, $nameFilter)) {
            return;
        }

        $dataFilter = collect(explode('|', $filterValue))
            ->filter(fn ($item) => filled($item));

        if ($dataFilter->isNotEmpty()) {
            $builder->$nameFilter($dataFilter);
        }
    }

    private function applyDirectFilter(Builder $builder, string $tableName, string $validFilter, $value, string $filterValue): void
    {
        $builder->where("{$tableName}.{$validFilter}", $value, $filterValue);
    }

    private function determineFilter(string | int $key, mixed $value): array
    {
        return is_string($key)
            ? [$key, false]
            : [$value, true];
    }
}
