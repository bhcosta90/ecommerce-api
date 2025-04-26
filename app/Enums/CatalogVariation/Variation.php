<?php

declare(strict_types = 1);

namespace App\Enums\CatalogVariation;

use Illuminate\Support\Collection;

enum Variation: int
{
    case Genre             = 1;
    case ProductWithColor  = 2;
    case ProductTwoColor   = 3;
    case SizeRingAlliance  = 4;
    case SizePants         = 5;
    case SizeShirtOrTShirt = 6;
    case SizeHelmet        = 7;
    case SizeTennis        = 8;
    case Voltage           = 9;
    case SizeJuvenileChild = 10;

    public function options(): ?array
    {
        return match ($this) {
            self::Genre => [
                'M' => 'Male',
                'F' => 'Female',
                'U' => 'Unisex',
            ],
            self::SizeRingAlliance => Collection::times(31, fn ($number): int => $number + 9)
                ->mapWithKeys(fn ($number) => [$number => $number])
                ->toArray(),
            self::SizePants => Collection::make(range(32, 70, 2))
                ->mapWithKeys(fn ($number) => [$number => $number])
                ->toArray(),
            self::SizeShirtOrTShirt => [
                'U'   => 'U',
                'PP'  => 'PP',
                'P'   => 'P',
                'M'   => 'M',
                'G'   => 'G',
                'GG'  => 'GG',
                'XG'  => 'XG',
                'XGG' => 'XGG',
                '1'   => '1',
                '2'   => '2',
                '3'   => '3',
                '4'   => '4',
                '5'   => '5',
            ],
            self::SizeHelmet => [
                '53-54' => '53-54',
                '55-56' => '55-56',
                '57-58' => '57-58',
                '59-60' => '59-60',
                '61-62' => '61-62',
                '63-64' => '63-64',
            ],
            self::SizeTennis => Collection::make(range(16, 48))
                ->mapWithKeys(fn ($number) => [$number => $number])
                ->toArray(),
            self::Voltage => [
                '127V'   => '127V',
                'Bivolt' => 'Bivolt',
                '110V'   => '110V',
                '220V'   => '220V',
                '380V'   => '380V',
            ],
            self::SizeJuvenileChild => [
                'RN' => 'RN',
                'P'  => 'P',
                'M'  => 'M',
                'G'  => 'G',
                'GG' => 'GG',
                '1'  => '1',
                '2'  => '2',
                '3'  => '3',
                '4'  => '4',
                '5'  => '5',
                '6'  => '6',
                '8'  => '8',
                '10' => '10',
                '12' => '12',
                '14' => '14',
                '16' => '16',
                '18' => '18',
            ],
            default => null,
        };
    }
}
