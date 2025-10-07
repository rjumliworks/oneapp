<?php

namespace App\Services\Assets\Equipments;

use App\Models\AssetEquipment;
use App\Models\AssetEquipmentLog;
use App\Http\Resources\Assets\EquipmentResource;

class ViewClass
{
    public function lists($request){
        $data = EquipmentResource::collection(
            AssetEquipment::query()
            ->with('logs.user.profile','location','user.profile','status')
            ->addSelect([
                'last_maintenance' => AssetEquipmentLog::select('date')->whereColumn('equipment_id', 'asset_equipment.id')->latest()->take(1),
            ])
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('code', 'LIKE', "%{$keyword}%")->orWhere('name', 'LIKE', "%{$keyword}%");
            })
            ->orderBy('code','ASC')
            ->paginate(10)
        );
        return $data;
    }
   
}
