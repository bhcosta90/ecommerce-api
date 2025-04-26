<?php

declare(strict_types = 1);

namespace Costa\Package\Controller;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

trait AsApiIndex
{
    abstract protected function model(): string;

    abstract protected function resource(): string;

    public function index(): AnonymousResourceCollection
    {
        /**
         * @var JsonResource $resource
         */
        $resource = $this->resource();

        $model = $this->model();

        $typePagination = $this->getTypePaginate();

        return $resource::collection($model::$typePagination());
    }

    protected function getTypePaginate(): string
    {
        return 'simplePaginate';
    }
}
