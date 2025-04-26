<?php

declare(strict_types = 1);

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Override;

/** @mixin Category */
final class CategoryResource extends JsonResource
{
    #[Override]
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'sector_id'  => $this->sector_id,
            'sector'     => new SectorResource($this->whenLoaded('sector')),
        ];
    }
}
