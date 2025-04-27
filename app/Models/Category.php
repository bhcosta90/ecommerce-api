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
use Illuminate\Support\Collection;

final class Category extends Model
{
    use AsModel;
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [
        'sector_id',
        'name',
    ];

    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }

    #[Scope]
    public function bySectorId(Builder $builder, Collection $params): void
    {
        $builder->whereIn('sector_id', $params);
    }

    #[Scope]
    public function byDepartmentId(Builder $builder, Collection $params): void
    {
        $builder->whereHas(
            'sector',
            fn (Builder $builder) => $builder->select('id')->byDepartmentId($params),
        );
    }
}
