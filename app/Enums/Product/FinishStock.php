<?php

declare(strict_types = 1);

namespace App\Enums\Product;

enum FinishStock: int
{
    case CONTINUE_SELLING = 0;
    case ONE_DAY          = 1;
    case TWO_DAYS         = 2;
    case THREE_DAYS       = 3;
    case FOUR_DAYS        = 4;
    case FIVE_DAYS        = 5;
    case SIX_DAYS         = 6;
    case SEVEN_DAYS       = 7;
    case EIGHT_DAYS       = 8;
    case NINE_DAYS        = 9;
    case TEN_DAYS         = 10;
    case FIFTEEN_DAYS     = 15;
    case TWENTY_DAYS      = 20;
    case TWENTY_FIVE_DAYS = 25;
    case THIRTY_DAYS      = 30;
    case THIRTY_FIVE_DAYS = 35;
    case FORTY_DAYS       = 40;
    case FORTY_FIVE_DAYS  = 45;
    case SIXTY_DAYS       = 60;
    case NINETY_DAYS      = 90;

    public function label(): string
    {
        return match ($this) {
            self::CONTINUE_SELLING => __('Continue selling with immediate availability'),
            self::ONE_DAY          => trans_choice('finish_stock', 1),
            self::TWO_DAYS         => trans_choice('finish_stock', 2),
            self::THREE_DAYS       => trans_choice('finish_stock', 3),
            self::FOUR_DAYS        => trans_choice('finish_stock', 4),
            self::FIVE_DAYS        => trans_choice('finish_stock', 5),
            self::SIX_DAYS         => trans_choice('finish_stock', 6),
            self::SEVEN_DAYS       => trans_choice('finish_stock', 7),
            self::EIGHT_DAYS       => trans_choice('finish_stock', 8),
            self::NINE_DAYS        => trans_choice('finish_stock', 9),
            self::TEN_DAYS         => trans_choice('finish_stock', 10),
            self::FIFTEEN_DAYS     => trans_choice('finish_stock', 15),
            self::TWENTY_DAYS      => trans_choice('finish_stock', 20),
            self::TWENTY_FIVE_DAYS => trans_choice('finish_stock', 25),
            self::THIRTY_DAYS      => trans_choice('finish_stock', 30),
            self::THIRTY_FIVE_DAYS => trans_choice('finish_stock', 35),
            self::FORTY_DAYS       => trans_choice('finish_stock', 40),
            self::FORTY_FIVE_DAYS  => trans_choice('finish_stock', 45),
            self::SIXTY_DAYS       => trans_choice('finish_stock', 60),
            self::NINETY_DAYS      => trans_choice('finish_stock', 90),
        };
    }
}
