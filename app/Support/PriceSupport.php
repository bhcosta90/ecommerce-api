<?php

declare(strict_types = 1);

namespace App\Support;

use Illuminate\Support\Number;

final class PriceSupport
{
    public function handle(float $value): string
    {
        return match (config('app.locale')) {
            'pt_BR' => (string) Number::currency($value, in: 'BRL', locale: 'pt-BR'),
            default => (string) Number::currency($value),
        };
    }
}
