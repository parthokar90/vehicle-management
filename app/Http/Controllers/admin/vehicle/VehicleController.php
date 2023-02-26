<?php

namespace App\Http\Controllers\admin\vehicle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleGroup;
use App\Models\VehicleType;
use App\Models\VehicleStatus;
use App\Models\VehicleOwnership;

class VehicleController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Vehicle::with('vehicleGroup','vehicleType','vehicleStatus','vehicleOwnership','assignedStaff')->orderBy('id','DESC')->get();
        return view('admin.vehicle.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = VehicleGroup::all();
        $type = VehicleType::all();
        $status = VehicleStatus::all();
        $ownership = VehicleOwnership::all();
        return view('admin.vehicle.create',compact('group','type','status','ownership'));
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
            'name'      => 'required',
            'plate_no'  => 'required',
            'type'      => 'required',
            'year'      => 'required',
            'engine_no' => 'required',
            'owner_ship'=> 'required',
            'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'    => 'required',
        ]);

        $imageName = time().'.'.$request->photo->extension();  
        $request->photo->move('admin/vehicle/', $imageName);
    
        $input = [
            'name'=> $request->name,
            'plate_no'=> $request->plate_no,
            'type'=> $request->type,
            'model'=> $request->model,
            'color'=> $request->color,
            'year'=> $request->year,
            'engine_no'=> $request->engine_no,
            'milage'=> $request->milage,
            'owner_ship'=> $request->owner_ship,
            'photo'=>  $imageName,
            'group_id'=> $request->group_id,
            'status'=> $request->status,
        ];

        $data = Vehicle::insert($input);
    
        return redirect()->route('vehicle.index')
                        ->with('success','vehicle created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Vehicle::find($id);
        $vehicle=Vehicle::orderBy('id','DESC')->get();
        return view('admin.vehicle.show',compact('data','vehicle'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Vehicle::find($id);
        $group = VehicleGroup::all();
        $type = VehicleType::all();
        $status = VehicleStatus::all();
        $ownership = VehicleOwnership::all();
        return view('admin.vehicle.edit',compact('data','group','type','status','ownership'));
    }

       /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function singleVehicle(Request $request){
        $all=Vehicle::all();
        $data = Vehicle::find($request->vehicle);
        return view('admin.vehicle.singleVehicle',compact('all','data'));
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
            'name'      => 'required',
            'plate_no'  => 'required',
            'type'      => 'required',
            'year'      => 'required',
            'engine_no' => 'required',
            'owner_ship'=> 'required',
            'photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'    => 'required',
        ]);

        $data = Vehicle::find($id);

        if($request->photo==''){
            $imageName = $data->photo;
        }else{
            $imageName = time().'.'.$request->photo->extension();  
            $request->photo->move('admin/vehicle/', $imageName);
        }

        Vehicle::where('id',$id)->update([
            'name'=> $request->name,
            'plate_no'=> $request->plate_no,
            'type'=> $request->type,
            'model'=> $request->model,
            'color'=> $request->color,
            'year'=> $request->year,
            'engine_no'=> $request->engine_no,
            'milage'=> $request->milage,
            'owner_ship'=> $request->owner_ship,
            'photo'=>  $imageName,
            'group_id'=> $request->group_id,
            'status'=> $request->status,
        ]);

        return redirect()->route('vehicle.index')
                        ->with('success','vehicle updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehicle::find($id)->delete();
        return redirect()->route('vehicle.index')
                        ->with('success','vehicle deleted successfully');
    }
}
