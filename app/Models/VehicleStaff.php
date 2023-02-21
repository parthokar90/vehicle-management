<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StaffType;
use App\Models\Vehicle;

class VehicleStaff extends Model
{
    use HasFactory;

    public $timestamps = true;

    public function staffType(){
        return $this->belongsTo(StaffType::class,'staff_type');
    }

    public function assignedVehicle(){
        return $this->belongsTo(Vehicle::class,'assigned_vehicle');
    }
}
