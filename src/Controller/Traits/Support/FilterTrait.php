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
            $validFilter = $value;
            $scope       = true;

            if (is_string($key)) {
                $validFilter = $key;
                $scope       = false;
            }

            if (array_key_exists($validFilter, $filters)) {
                if ($scope) {
                    $nameFilter = str("by_{$validFilter}")->camel()->toString();
                    $nameScoped = str("scope_by_{$validFilter}")->camel()->toString();

                    if (!method_exists($classModel, $nameScoped) && !method_exists($classModel, $nameFilter)) {
                        return;
                    }

                    $dataFilter = collect(explode('|', $filters[$validFilter] ?? ''))
                        ->filter(fn ($item) => filled($item))
                        ->toArray();

                    $builder->$nameFilter(array_values($dataFilter));
                } else {
                    $builder->where($tableName . '.' . $validFilter, $value, $filters[$validFilter]);
                }
            }
        }
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
