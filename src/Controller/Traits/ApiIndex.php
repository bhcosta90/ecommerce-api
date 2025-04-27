<?php

declare(strict_types = 1);

namespace Costa\Package\Controller\Traits;

use Costa\Package\Controller\Traits\Support\QueryModel;
use Costa\Package\Controller\Traits\Support\IncludeTrait;
use Costa\Package\Controller\Traits\Support\RawSqlTrait;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

trait ApiIndex
{
    use QueryModel;
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

        $queryModel = $this->getQueryBuilder();

        $typePagination = $this->getTypePaginate();

        return $resource::collection($queryModel->$typePagination())
            ->additional($this->getRouteIncludes());
    }

    protected function getTypePaginate(): string
    {
        return 'simplePaginate';
    }
}
