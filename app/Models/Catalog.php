<?php

declare(strict_types = 1);

namespace App\Models;

use App\Enums\Catalog\Situation;
use Costa\Package\Model\AsModel;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Catalog extends Model
{
    use AsModel;
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [
        'branch_id',
        'name',
        'description',
        'sku',
        'situation',
        'main_id',
        'main_type',
        'gtin',
        'mpn',
        'ncm',
        'size_weight',
        'size_height',
        'size_width',
        'size_depth',
        'is_variation',
        'is_active',
        'is_visible',
        'is_selling',
        'is_prominently',
    ];

    protected $casts = [
        'situation'    => Situation::class,
        'is_variation' => 'boolean',
        'is_active'    => 'boolean',
        'is_visible'   => 'boolean',
        'is_selling'   => 'boolean',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function categories(): HasOne
    {
        return $this->hasOne(CatalogCategory::class);
    }

    public function main(): MorphTo
    {
        return $this->morphTo();
    }
}
