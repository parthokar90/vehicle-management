<?php

namespace App\Http\Controllers\admin\vehicle\status;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleStatus;

class VehicleStatusController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = VehicleStatus::orderBy('id','DESC')->get();
        return view('admin.vehicle.status.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group = VehicleStatus::all();
        return view('admin.vehicle.status.create',compact('group'));
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
            'vehicle_status' => 'required',
        ]);
    
        $input = [
            'vehicle_status'=> $request->vehicle_status,
        ];

        $data = VehicleStatus::insert($input);
    
        return redirect()->route('vehicle-status.index')
                        ->with('success','status created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = VehicleStatus::find($id);
        return view('admin.vehicle.status.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = VehicleStatus::find($id);
        return view('admin.vehicle.status.edit',compact('user'));
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
            'vehicle_status' => 'required',
        ]);

        VehicleStatus::where('id',$id)->update([
            'vehicle_status'=> $request->vehicle_status,
        ]);

        return redirect()->route('vehicle-status.index')
                        ->with('success','status updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VehicleStatus::find($id)->delete();
        return redirect()->route('vehicle-status.index')
                        ->with('success','status deleted successfully');
    }
}
