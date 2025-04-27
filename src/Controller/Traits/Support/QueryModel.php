<?php

declare(strict_types = 1);

namespace Costa\Package\Controller\Traits\Support;

use Illuminate\Database\Eloquent\Builder;

trait QueryModel
{
    use FilterTrait;
    use IncludeTrait;
    use RawSqlTrait;

    public function getQueryBuilder(
        ?string $id = null,
        ?string $includes = null,
        ?array $filters = [],
    ): Builder {
        $model = $this->model();

        /** @var Builder $queryModel */
        $queryModel = new $model()->query();

        if ($id) {
            $queryModel->where($queryModel->getModel()->getKeyName(), $id);
        }

        if (filled($includes)) {
            $queryModel->with($this->getIncludes($includes));
        }

        if (filled($filters)) {
            $this->getFilters($queryModel, $filters);
        }

        return tap($queryModel, fn ($query) => $this->rawSql($query));
    }
}
