<?php

namespace App\Http\Controllers\admin\vehicle\ownership;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleOwnership;

class VehicleOwnershipController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = VehicleOwnership::orderBy('id','DESC')->get();
        return view('admin.vehicle.ownership.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.vehicle.ownership.create');
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
            'vehicle_ownership' => 'required',
        ]);
    
        $input = [
            'vehicle_ownership'=> $request->vehicle_ownership,
        ];

        $user = VehicleOwnership::insert($input);
    
        return redirect()->route('vehicle-ownership.index')
                        ->with('success','Ownership created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = VehicleOwnership::find($id);
        return view('admin.vehicle.ownership.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = VehicleOwnership::find($id);
        return view('admin.vehicle.ownership.edit',compact('user'));
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
            'vehicle_ownership' => 'required',
        ]);
    
        VehicleOwnership::where('id',$id)->update([
            'vehicle_ownership'=> $request->vehicle_ownership,
        ]);

        return redirect()->route('vehicle-ownership.index')
                        ->with('success','Ownership updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VehicleOwnership::find($id)->delete();
        return redirect()->route('vehicle-ownership.index')
                        ->with('success','Ownership deleted successfully');
    }
}
