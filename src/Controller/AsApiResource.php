<?php

namespace Costa\Package\Controller;

trait AsApiResource {
    public function index() {
        $model = $this->model();

        $resource = $this->resource();

        $typePagination = $this->getTypePaginate();

        return $resource::collection($model::$typePagination());
    }

    public function getTypePaginate(): string {
        return 'simplePaginate';
    }

    abstract protected function model(): string;

    abstract protected function resource(): string;
}
