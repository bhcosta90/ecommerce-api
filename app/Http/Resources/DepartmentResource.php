<?php

declare(strict_types = 1);

namespace App\Http\Resources;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Department
 */
final class DepartmentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'sectors'    => SectorResource::collection($this->whenLoaded('sectors')),
            'actions'    => $this->actions,
        ];
    }
}
