<?php

declare(strict_types = 1);

namespace App\Models;

use App\Casts\ValueCast;
use App\Enums\Product\Availability;
use App\Enums\Product\FinishStock;
use Costa\Package\Model\AsModel;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Response;
use Laravel\Pennant\Feature;
use Override;

final class Product extends Model
{
    use AsModel;
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'sku',
        'catalog_id',
        'situation',
        'is_active',
        'is_sale',
        'is_prominent',
        'description',
        'price_cost',
        'price_sale',
        'is_price',
        'sku',
        'finish_stock',
        'available_at',
        'total_stock',
        'price_consultation',
    ];

    protected $casts = [
        'price_sale'         => ValueCast::class,
        'price_cost'         => ValueCast::class,
        'total_stock'        => ValueCast::class,
        'price_consultation' => 'bool',
        'finish_stock'       => FinishStock::class,
        'available_at'       => Availability::class,
    ];

    #[Override]
    protected static function booted(): void
    {
        parent::booted();

        self::saving(function (Product $product): void {
            abort_if(
                $product->price_consultation && Feature::active('price-consultation'),
                Response::HTTP_FORBIDDEN,
                'Price consultation is not allowed.'
            );
        });
    }
}
