<?php

declare(strict_types = 1);

namespace App\Models;

use App\Enums\CatalogVariation\Variation;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

final class CatalogVariation extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [
        'catalog_id',
        'variation',
    ];

    protected $casts = [
        'variation' => Variation::class,
    ];

    public function catalog(): BelongsTo
    {
        return $this->belongsTo(Catalog::class);
    }
}
