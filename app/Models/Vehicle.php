<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VehicleGroup;
use App\Models\VehicleType;
use App\Models\VehicleStatus;
use App\Models\VehicleOwnership;
use App\Models\VehicleStaff;

class Vehicle extends Model
{
    use HasFactory;

    public $timestamps = true;

    public function vehicleGroup(){
        return $this->belongsTo(VehicleGroup::class,'group_id');
    }

    public function vehicleType(){
        return $this->belongsTo(VehicleType::class,'type');
    }

    public function vehicleStatus(){
        return $this->belongsTo(VehicleStatus::class,'status');
    }

    public function vehicleOwnership(){
        return $this->belongsTo(VehicleOwnership::class,'owner_ship');
    }

    public function assignedStaff(){
        return $this->hasMany(VehicleStaff::class,'assigned_vehicle');
    }

}
