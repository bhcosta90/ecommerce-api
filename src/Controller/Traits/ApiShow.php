<?php

declare(strict_types = 1);

namespace Costa\Package\Controller\Traits;

use Costa\Package\Controller\Traits\Support\QueryModel;
use Costa\Package\Controller\Traits\Support\IncludeTrait;
use Illuminate\Http\Resources\Json\JsonResource;

trait ApiShow
{
    use QueryModel;
    use IncludeTrait;

    abstract protected function model(): string;

    abstract protected function resource(): string;

    public function show()
    {
        /**
         * @var JsonResource $resource
         */
        $resource = $this->resource();

        $params = request()->route()->parameters();
        $id     = end($params);

        return new $resource($this->getQueryBuilder($id)->sole())
            ->additional($this->getRouteIncludes());
    }
}
