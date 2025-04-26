<?php

declare(strict_types = 1);

namespace App\Http\Resources;

use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Override;

/** @mixin Sector */
final class SectorResource extends JsonResource
{
    #[Override]
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'department_id' => $this->department_id,
            'department'    => new DepartmentResource($this->whenLoaded('department')),
            'actions'       => $this->actions,
        ];
    }
}
