<?php

declare(strict_types = 1);

namespace App\Http\Resources;

use App\Models\CatalogVariation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Override;

/** @mixin CatalogVariation */
final class CatalogVariationResource extends JsonResource
{
    #[Override]
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'variation'  => $this->variation,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'catalog_id' => $this->catalog_id,

            'catalog' => new CatalogResource($this->whenLoaded('catalog')),
        ];
    }
}
