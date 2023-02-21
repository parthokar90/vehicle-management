<?php

namespace App\Http\Controllers\admin\vehicle\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StaffType;
use App\Models\Vehicle;
use App\Models\VehicleStaff;

class VehicleStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=VehicleStaff::with('staffType','assignedVehicle')->orderBy('id','DESC')->get();
        return view('admin.vehicle.staff.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $type=StaffType::all();
       $vehicle=Vehicle::all();
       return view('admin.vehicle.staff.create',compact('type','vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'staff_id' => 'required|unique:vehicle_staff,staff_id',
            'staff_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'phone' => 'required|unique:vehicle_staff,phone',
            'email' => 'email|unique:vehicle_staff,email',
            'date_of_birth' => 'required',
            'nid_no' => 'required|unique:vehicle_staff,nid_no',
            'present_address' => 'required',
            'permanent_address' => 'required',
        ]);

        $imageName='';
        if($request->profile_photo!=null){
            $imageName = time().'.'.$request->profile_photo->extension();  
            $request->profile_photo->move('admin/vehicle/staff/', $imageName);
        }

        $input = [
            'staff_id' => $request->staff_id,
            'staff_name' => $request->staff_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'contact_one' => $request->contact_one,
            'contact_two' => $request->contact_two,
            'date_of_birth' => $request->date_of_birth,
            'nid_no' => $request->nid_no,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'staff_type' => $request->staff_type,
            'work_experience' => $request->work_experience,
            'previous_organisation' => $request->previous_organisation,
            'assigned_vehicle' => $request->assigned_vehicle,
            'profile_photo' => $imageName,
            'status' => $request->status,
        ];

        $user = VehicleStaff::insert($input);

        return redirect()->route('vehicle-staff.index')
                        ->with('success','Vehicle Staff created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=VehicleStaff::find($id);
        return view('admin.vehicle.staff.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=VehicleStaff::find($id);
        $type=StaffType::all();
        $vehicle=Vehicle::all();
        return view('admin.vehicle.staff.edit',compact('user','type','vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'staff_id' => 'required|unique:vehicle_staff,staff_id,'.$id,
            'staff_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'phone' => 'required|unique:vehicle_staff,phone,'.$id,
            'email' => 'email|unique:vehicle_staff,email,'.$id,
            'date_of_birth' => 'required',
            'nid_no' => 'required|unique:vehicle_staff,nid_no,'.$id,
            'present_address' => 'required',
            'permanent_address' => 'required',
        ]);

        $staff=VehicleStaff::find($id);

        $imageName=$staff->profile_photo;
        if($request->profile_photo!=null){
            $imageName = time().'.'.$request->profile_photo->extension();  
            $request->profile_photo->move('admin/vehicle/staff/', $imageName);
        }

        VehicleStaff::where('id',$id)->update([
            'staff_id' => $request->staff_id,
            'staff_name' => $request->staff_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'contact_one' => $request->contact_one,
            'contact_two' => $request->contact_two,
            'date_of_birth' => $request->date_of_birth,
            'nid_no' => $request->nid_no,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'staff_type' => $request->staff_type,
            'work_experience' => $request->work_experience,
            'previous_organisation' => $request->previous_organisation,
            'assigned_vehicle' => $request->assigned_vehicle,
            'profile_photo' => $imageName,
            'status' => $request->status,
        ]);

        return redirect()->route('vehicle-staff.index')
                        ->with('success','Vehicle Staff updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VehicleStaff::find($id)->delete();
        return redirect()->route('vehicle-staff.index')
                        ->with('success','Vehicle Staff deleted successfully');
    }
}
