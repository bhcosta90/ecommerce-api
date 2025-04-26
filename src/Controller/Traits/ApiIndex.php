<?php

declare(strict_types = 1);

namespace Costa\Package\Controller\Traits;

use Costa\Package\Controller\Traits\Support\IncludeTrait;
use Costa\Package\Controller\Traits\Support\RawSqlTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

trait ApiIndex
{
    use IncludeTrait;
    use RawSqlTrait;

    abstract protected function model(): string;

    abstract protected function resource(): string;

    public function index(): AnonymousResourceCollection
    {
        /**
         * @var JsonResource $resource
         */
        $resource = $this->resource();

        $model = $this->model();

        /** @var Builder $queryModel */
        $queryModel = new $model()->query();

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

        $typePagination = $this->getTypePaginate();

        return $resource::collection($queryModel->$typePagination())
            ->additional($additional);
    }

    protected function getTypePaginate(): string
    {
        return 'simplePaginate';
    }
}
