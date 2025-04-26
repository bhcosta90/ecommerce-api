<?php

declare(strict_types = 1);

namespace Costa\Package\Controller\Traits;

use Costa\Package\Controller\Traits\Support\IncludeTrait;
use Costa\Package\Controller\Traits\Support\RawSqlTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\JsonResource;

trait ApiShow
{
    use IncludeTrait;
    use RawSqlTrait;

    abstract protected function model(): string;

    abstract protected function resource(): string;

    public function show()
    {
        $params = request()->route()->parameters();
        $id     = end($params);

        /**
         * @var JsonResource $resource
         */
        $resource = $this->resource();

        $model = $this->model();

        /** @var Builder $queryModel */
        $queryModel = ($xModel = new $model())->query();

        $queryModel->where($xModel->getKeyName(), $id);

        if ($includes = request('includes')) {
            $queryModel->with($this->getIncludes($includes));
        }

        $additional = [];

        if (app()->isLocal()) {
            $additional += [
                'includes' => $this->allowIncludes(),
            ];
        }

        $this->rawSql($queryModel);

        return new $resource($queryModel->sole())
            ->additional($additional);
    }
}
