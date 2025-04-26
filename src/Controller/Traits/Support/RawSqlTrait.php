<?php

declare(strict_types = 1);

namespace Costa\Package\Controller\Traits\Support;

trait RawSqlTrait
{
    protected function rawSql($query)
    {
        if (config('app.debug')) {
            match (true) {
                request()->has('dd')       => $query->dd(),
                request()->has('dump')     => $query->dump(),
                request()->has('dd_raw')   => $query->ddRawSql(),
                request()->has('dump_raw') => $query->dumpRawSql(),
                default                    => false,
            };
        }
    }
}
