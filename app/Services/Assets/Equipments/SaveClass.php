<?php

namespace App\Services\Assets\Equipments;

use App\Models\AssetEquipment;
use App\Models\AssetEquipmentLog;
use App\Http\Resources\Assets\EquipmentResource;

class SaveClass
{
    public function save($request){
        $service = AssetEquipment::create(array_merge($request->all(),[
            'user_id' => \Auth::user()->id,
            'status_id' => 31
        ]));
        if($service){
            $service->location()->create($request->all());
        }
        return [
            'data' => $service,
            'message' => 'Equipment added successful!', 
            'info' => "You've successfully added the new equipment."
        ];
    }

    public function perform($request){
        $service = AssetEquipmentLog::create(array_merge($request->all(),[
            'user_id' => \Auth::user()->id
        ]));
        if($service){
            AssetEquipment::where('id',$request->equipment_id)->update(['maintenance_due' => $request->next_date]);
        }

        $data = AssetEquipment::with('logs','location','user.profile','status')
        ->addSelect([
            'last_maintenance' => AssetEquipmentLog::select('date')->whereColumn('equipment_id', 'asset_equipment.id')->latest()->take(1),
        ])
        ->where('id',$request->equipment_id)->first();

        return [
            'data' => new EquipmentResource($data),
            'message' => 'Equipment successfully calibrated or maintained.', 
            'info' => "Your submission has been recorded. The next due date is automatically set based on the duration field."
        ];
    }
}
