<?php

declare(strict_types = 1);

namespace Costa\Package\Controller\Traits;

use Costa\Package\Controller\Traits\Support\QueryModel;
use Costa\Package\Controller\Traits\Support\RawSqlTrait;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

trait ApiIndex
{
    use QueryModel;
    use RawSqlTrait;

    abstract protected function model(): string;

    abstract protected function resource(): string;

    public function index(): AnonymousResourceCollection
    {
        /**
         * @var JsonResource $resource
         */
        $resource = $this->resource();

        $queryModel = $this->getQueryBuilder(
            includes: request('includes', ''),
            filters: request('filters', []),
        );

        $typePagination = $this->getTypePaginate();

        $additional = [];

        if ($addAdditional = $this->getRouteIncludes()) {
            $additional += [
                'includes' => $addAdditional,
            ];
        }

        if ($addAdditional = $this->getRouteFilters()) {
            $additional += [
                'filters' => $addAdditional,
            ];
        }

        return $resource::collection($queryModel->$typePagination())
            ->additional($additional);
    }

    protected function getTypePaginate(): string
    {
        return 'paginate';
    }
}
