<?php

declare(strict_types = 1);

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

final readonly class ValueCast implements CastsAttributes
{
    private string $decimal;

    public function __construct(int $decimal = 2)
    {
        $this->decimal = str(1)->padRight($decimal + 1, '0')->toString();
    }

    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if (!isset($value)) {
            return null;
        }

        return (float) bcdiv((string) $value, $this->decimal, mb_strlen($this->decimal) - 1);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        if (!isset($value)) {
            return null;
        }

        return (int) bcmul((string) $value, $this->decimal);
    }
}
