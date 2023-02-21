<?php 

namespace App\Http\traits;

use App\Models\Designation;

trait DepartmentDesignation{

    public function deptDesignation($id){
       return Designation::where('id',$id)
       ->join('roles','roles.id','=','designations.department_id')
       ->select('roles.id','roles.name')
       ->get();
    }
}