<?php

declare(strict_types = 1);

namespace App\Models;

use Costa\Package\Model\AsModel;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

final class SubCategory extends Model
{
    use AsModel;
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    #[Scope]
    public function byCategoryId(Builder $builder, array $params = []): void
    {
        $builder->whereIn('category_id', $params);
    }

    #[Scope]
    public function bySectorId(Builder $builder, array $params = []): void
    {
        $builder->whereHas(
            'category',
            fn (Builder $builder) => $builder->select('id')->bySectorId($params),
        );
    }

    #[Scope]
    public function byDepartmentId(Builder $builder, array $params = []): void
    {
        $builder->whereHas(
            'category.sector',
            fn (Builder $builder) => $builder->select('id')->byDepartmentId($params),
        );
    }
}
