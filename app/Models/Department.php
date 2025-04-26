<?php

declare(strict_types = 1);

namespace App\Models;

use Costa\Package\Model\AsModel;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Department extends Model
{
    use AsModel;
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function sectors(): HasMany
    {
        return $this->hasMany(Sector::class);
    }
}
