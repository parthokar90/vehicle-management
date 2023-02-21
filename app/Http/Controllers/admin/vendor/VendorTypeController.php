<?php

namespace App\Http\Controllers\admin\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VendorType;

class VendorTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = VendorType::orderBy('id','DESC')->get();
        return view('admin.vendor.type.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.vendor.type.create');
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
            'type' => 'required',
        ]);
    
        $input = [
            'type'=> $request->type,
        ];

        $user = VendorType::insert($input);
    
        return redirect()->route('vendor-type.index')
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
        $user = VendorType::find($id);
        return view('admin.vendor.type.show',compact('user'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = VendorType::find($id);
        return view('admin.vendor.type.edit',compact('user'));
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
            'type' => 'required',
        ]);
    
        VendorType::where('id',$id)->update([
            'type'=> $request->type,
        ]);

        return redirect()->route('vendor-type.index')
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
        VendorType::find($id)->delete();
        return redirect()->route('vendor-type.index')
                        ->with('success','Type deleted successfully');
    }
}
