<?php

declare(strict_types = 1);

namespace Costa\Package\Controller\Traits\Support;

use Illuminate\Database\Eloquent\Builder;

trait ByQueryModel
{
    use RawSqlTrait;

    public function getQueryBuilder(?string $id = null): Builder
    {
        $model = $this->model();

        /** @var Builder $queryModel */
        $queryModel = ($xModel = new $model())->query();

        if ($id) {
            $queryModel->where($xModel->getKeyName(), $id);
        }

        if ($includes = request('includes')) {
            $queryModel->with($this->getIncludes($includes));
        }

        $this->rawSql($queryModel);

        return $queryModel;
    }
}
