<?php

declare(strict_types = 1);

namespace App\Enums\Catalog;

enum Situation: int
{
    case NEW  = 1;
    case USED = 2;

    public function label(): string
    {
        return match ($this) {
            self::NEW  => __('New'),
            self::USED => __('Used'),
        };
    }
}
