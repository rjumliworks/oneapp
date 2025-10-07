<?php

namespace App\Http\Resources\Assets;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipmentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
         return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'brand' => $this->brand,
            'model' => $this->model,
            'price' => $this->price,
            'acquired_at' => ($this->acquired_at) ? $this->acquired_at : '-',
            'logs' => LogResource::collection($this->logs),
            'last_calibration' => ($this->last_calibration) ? $this->last_calibration : '-',
            'last_maintenance' => ($this->last_maintenance) ? $this->last_maintenance : '-',
            'maintenance_plan' => $this->maintenance_plan,
            'maintenance_due' => ($this->maintenance_due) ? $this->maintenance_due : '-',
            'status' => $this->status,
            'station' => $this->location->station,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
