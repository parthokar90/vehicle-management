<?php

namespace App\Http\Controllers\admin\vehicle\staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StaffType;

class StaffTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = StaffType::orderBy('id','DESC')->get();
        return view('admin.vehicle.staff.type.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.vehicle.staff.type.create');
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
            'staff_type' => 'required',
        ]);
    
        $input = [
            'staff_type'=> $request->staff_type,
        ];

        $user = StaffType::insert($input);
    
        return redirect()->route('staff-type.index')
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
        $user = StaffType::find($id);
        return view('admin.vehicle.staff.type.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = StaffType::find($id);
        return view('admin.vehicle.staff.type.edit',compact('user'));
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
            'staff_type' => 'required',
        ]);
    
        StaffType::where('id',$id)->update([
            'staff_type'=> $request->staff_type,
        ]);

        return redirect()->route('staff-type.index')
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
        StaffType::find($id)->delete();
        return redirect()->route('staff-type.index')
                        ->with('success','Type deleted successfully');
    }
}
