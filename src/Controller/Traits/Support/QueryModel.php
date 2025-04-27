<?php

declare(strict_types = 1);

namespace Costa\Package\Controller\Traits\Support;

use Illuminate\Database\Eloquent\Builder;

trait QueryModel
{
    use RawSqlTrait;

    public function getQueryBuilder(?string $id = null): Builder
    {
        $model = $this->model();

        /** @var Builder $queryModel */
        $queryModel = new $model()->query();

        if ($id) {
            $queryModel->where($queryModel->getModel()->getKeyName(), $id);
        }

        if ($includes = request('includes')) {
            $queryModel->with($this->getIncludes($includes));
        }

        return tap($queryModel, fn ($query) => $this->rawSql($query));
    }
}
