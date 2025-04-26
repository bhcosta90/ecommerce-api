<?php

declare(strict_types = 1);

namespace App\Facade;

use App\Support\PriceSupport;
use Illuminate\Support\Facades\Facade;

final class PriceFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return PriceSupport::class;
    }
}
