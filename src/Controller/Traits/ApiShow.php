<?php

declare(strict_types = 1);

namespace Costa\Package\Controller\Traits;

use Costa\Package\Controller\Traits\Support\ByModelRoute;
use Costa\Package\Controller\Traits\Support\IncludeTrait;
use Illuminate\Http\Resources\Json\JsonResource;

trait ApiShow
{
    use ByModelRoute;
    use IncludeTrait;

    abstract protected function model(): string;

    abstract protected function resource(): string;

    public function show()
    {
        /**
         * @var JsonResource $resource
         */
        $resource = $this->resource();

        $additional = [];

        if (app()->isLocal()) {
            $additional += [
                'includes' => $this->allowIncludes(),
            ];
        }

        return new $resource($this->getModelByRoute())
            ->additional($additional);
    }
}
