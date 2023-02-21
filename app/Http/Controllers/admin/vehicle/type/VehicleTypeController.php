<?php

namespace App\Http\Controllers\admin\vehicle\type;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleType;

class VehicleTypeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = VehicleType::orderBy('id','DESC')->get();
        return view('admin.vehicle.type.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vehicle.type.create');
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
            'vehicle_type'      => 'required',
        ]);
    
        $input = [
            'vehicle_type'=> $request->vehicle_type,
        ];

        $data = VehicleType::insert($input);
    
        return redirect()->route('vehicle-type.index')
                        ->with('success','Type created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = VehicleType::find($id);
        return view('admin.vehicle.type.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = VehicleType::find($id);
        return view('admin.vehicle.type.edit',compact('user'));
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
            'vehicle_type'      => 'required',
        ]);

        VehicleType::where('id',$id)->update([
            'vehicle_type'=> $request->vehicle_type,
        ]);

        return redirect()->route('vehicle-type.index')
                        ->with('success','Type updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VehicleType::find($id)->delete();
        return redirect()->route('vehicle-type.index')
                        ->with('success','Type deleted successfully');
    }
}
