<?php

declare(strict_types = 1);

namespace Costa\Package\Controller\Traits\Support;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait ByModelRoute
{
    use RawSqlTrait;

    public function getModelByRoute(): Model
    {
        $params = request()->route()->parameters();
        $model  = $this->model();

        /** @var Builder $queryModel */
        $queryModel = ($xModel = new $model())->query();

        $id = end($params);
        $queryModel->where($xModel->getKeyName(), $id);

        if ($includes = request('includes')) {
            $queryModel->with($this->getIncludes($includes));
        }

        $this->rawSql($queryModel);

        return $queryModel->sole();
    }
}
