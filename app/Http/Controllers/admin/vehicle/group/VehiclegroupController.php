<?php

namespace App\Http\Controllers\admin\vehicle\group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleGroup;

class VehiclegroupController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = VehicleGroup::orderBy('id','DESC')->get();
        return view('admin.vehicle.group.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.vehicle.group.create');
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
            'group' => 'required',
        ]);
    
        $input = [
            'group'=> $request->group,
        ];

        $user = VehicleGroup::insert($input);
    
        return redirect()->route('vehicle-group.index')
                        ->with('success','Group created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = VehicleGroup::find($id);
        return view('admin.vehicle.group.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = VehicleGroup::find($id);
        return view('admin.vehicle.group.edit',compact('user'));
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
            'group' => 'required',
        ]);
    
        VehicleGroup::where('id',$id)->update([
            'group'=> $request->group,
        ]);

        return redirect()->route('vehicle-group.index')
                        ->with('success','Group updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Group::find($id)->delete();
        return redirect()->route('vehicle-group.index')
                        ->with('success','Group deleted successfully');
    }
}
