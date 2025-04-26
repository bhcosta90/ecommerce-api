<?php

declare(strict_types = 1);

namespace App\Models;

use Costa\Package\Model\AsModel;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

final class CatalogCategory extends Model
{
    use AsModel;
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'catalog_id',
        'department_id',
        'sector_id',
        'category_id',
        'sub_category_id',
    ];

    public function catalog(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'catalog_id');
    }

    public function departament(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }
}
