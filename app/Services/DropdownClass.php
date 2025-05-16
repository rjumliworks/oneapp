<?php

namespace App\Services;

use App\Models\ListUnit;
use App\Models\ListData;
use App\Models\ListRole;
use App\Models\ListStatus;
use App\Models\ListLeave;
use App\Models\ListPosition;
use App\Models\ListDropdown;
use App\Models\LocationRegion;
use App\Models\LocationProvince;
use App\Models\LocationMunicipality;
use App\Models\LocationBarangay;

class DropdownClass
{  

    public function dropdowns($class,$type = null){
        $data = ListDropdown::where('classification',$class)
        ->when($type, function ($query) use ($type){
            $query->where('type',$type);
        })
        ->where('is_active',1)
        ->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'others' => $item->others,
                'type' => $item->type
            ];
        });
        return $data;
    }

    public function leaves(){
        $data = ListLeave::where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'citation' => $item->citation,
                'is_regular' => $item->is_regular,
                'is_increasing' => $item->is_increasing,
                'is_active' => $item->is_active
            ];
        });
        return $data;
    }



    public function doctypes(){
        $data = ListData::where('type','Document Type')->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function docactions(){
        $data = ListData::where('type','Document Action')->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function levels(){
        $data = ListData::where('type','Level')->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function eligibilities(){
        $data = ListData::where('type','Eligibility')->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function licenses(){
        $data = ListData::where('type','License')->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function types(){
        $data = ListData::where('type','Type')->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function statuses(){
        $data = ListStatus::where('classification','Status')->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'type' => $item->type,
                'color' => $item->color,
                'color' => $item->others,
            ];
        });
        return $data;
    }

    public function positions(){
        $data = ListPosition::with('special','administrative')->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'special' => ($item->special) ? $item->special->name : '-',
                'administrative' => ($item->administrative) ? $item->administrative->name : '-'
            ];
        });
        return $data;
    }

    public function semesters(){
        $data = ListDropdown::where('classification','Period')->where('type','Semester')->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'others' => $item->others
            ];
        });
        return $data;
    }

    public function stations(){
        $data = ListDropdown::where('classification','Station')->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name.' ('.$item->others.')',
                'others' => $item->others
            ];
        });
        return $data;
    }

    public function divisions(){
        $data = ListDropdown::where('classification','Division')->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'others' => $item->others
            ];
        });
        return $data;
    }

    public function religions(){
        $data = ListData::where('type','Religion')->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function bloods(){
        $data = ListData::where('type','Blood Type')->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function maritals(){
        $data = ListData::where('type','Marital Status')->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function employment_statuses(){
        $data = ListData::where('type','Employment Status')->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function roles(){
        $data = ListRole::where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'has_lab' => $item->has_lab
            ];
        });
        return $data;
    }

    public function regions(){
        $data = LocationRegion::all()->map(function ($item) {
            return [
                'value' => $item->code,
                'name' => $item->region
            ];
        });
        return $data;
    }

    public function provinces($code){
        $data = LocationProvince::where('region_code',$code)->get()->map(function ($item) {
            return [
                'value' => $item->code,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function municipalities($code){
        $data = LocationMunicipality::where('province_code',$code)->get()->map(function ($item) {
            return [
                'value' => $item->code,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function barangays($code){
        $data = LocationBarangay::where('municipality_code',$code)->get()->map(function ($item) {
            return [
                'value' => $item->code,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function units($code){
        $data = ListUnit::where('division_id',$code)->where('is_active',1)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'short' => $item->short
            ];
        });
        return $data;
    }
}
