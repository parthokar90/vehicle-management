<?php

namespace App\Http\Controllers\admin\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Division;
use App\Models\User;
use App\Models\District;
use App\Models\Thana;
use App\Models\CollectionMethod;
use App\Models\VendorType;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


    $status = $request->input('status');
    $employee = $request->input('employee');
    $district = $request->input('district');
    $thana = $request->input('thana');
    $from = $request->input('from');
    $to = $request->input('to');

    $query = Vendor::query();
    
    if ($status) {
        $query->where('global_status', $status);
    }
    if ($employee) {
        $query->where('vendor_type', 'like', "%$employee%");
    }
    if ($district) {
        $query->where('district', 'like', "%$district%");
    }
    if ($thana) {
        $query->where('thana', 'like', "%$thana%");
    }

    if ($from) {
        $query->where('account_opening_date', '=', $from);
    }
    if ($to) {
        $query->where('account_opening_date', '=', $to);
    }

    if($from && $to){
        $query->whereBetween('account_opening_date',[$from,$to]);
    }

    $data = $query->get();


    if($data->count()>0){
        $users = User::all();
        $district = District::all();
        $thana = Thana::all();
        $vendorType = VendorType::all();
        return view('admin.vendor.index',compact('data','users','district','thana','vendorType'));
    }else{
        $data = Vendor::orderBy('id','DESC')->get();
        $users = User::all();
        $district = District::all();
        $thana = Thana::all();
        $vendorType = VendorType::all();
     
        return view('admin.vendor.index',compact('data','users','district','thana','vendorType'));
    }

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $district = District::all();
        $division = Division::all();
        $thana = Thana::all();
        $users = User::all();
        $collections = CollectionMethod::all();
        $vendorType = VendorType::all();
       return view('admin.vendor.create',compact('district','division','thana','users','collections','vendorType'));
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
            'vendor_type' => 'required',
            'vendor_name' => 'required',
            'company_name' => 'required',
            'division' => 'required',
            'district' => 'required',
            'thana' => 'required',
            'nid_no' => 'required',
            'contact_one' => 'required',
            'contact_email' => 'required',
            'account_opening_date' => 'required',
            'global_status' => 'required',
        ]);
    
        $input = [
            'vendor_type' => $request->vendor_type,
            'vendor_name' => $request->vendor_name,
            'company_name' => $request->company_name,
            'division' => $request->division,
            'district' => $request->district,
            'thana' => $request->thana,
            'nid_no' => $request->nid_no,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'sms_phone' => $request->sms_phone,
            'emergency_phone' => $request->emergency_phone,
            'contact_one' => $request->contact_one,
            'contact_two' => $request->contact_two,
            'contact_email' => $request->contact_email,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'company_address' => $request->company_address,
            'short_note' => $request->short_note,
            'account_opening_date' => $request->account_opening_date,
            'reporter' => $request->reporter,
            'follower' => $request->follower,
            'account_note' => $request->account_note,
            'global_status' => $request->global_status,
        ];

        $user = Vendor::insert($input);
    
        return redirect()->route('vendor.index')
                        ->with('success','Vendor created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Vendor::find($id);
        return view('admin.vendor.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Vendor::find($id);
        $district = District::all();
        $division = Division::all();
        $thana = Thana::all();
        $collections = CollectionMethod::all();
        $users = User::all();
        $vendorType = VendorType::all();
        return view('admin.vendor.edit',compact('user','district','thana','division','collections','users','vendorType'));
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
            'vendor_type' => 'required',
            'vendor_name' => 'required',
            'company_name' => 'required',
            'division' => 'required',
            'district' => 'required',
            'thana' => 'required',
            'nid_no' => 'required',
            'contact_one' => 'required',
            'contact_email' => 'required',
            'account_opening_date' => 'required',
            'global_status' => 'required',
        ]);
    
        Vendor::where('id',$id)->update([
            'vendor_type' => $request->vendor_type,
            'vendor_name' => $request->vendor_name,
            'company_name' => $request->company_name,
            'division' => $request->division,
            'district' => $request->district,
            'thana' => $request->thana,
            'nid_no' => $request->nid_no,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'sms_phone' => $request->sms_phone,
            'emergency_phone' => $request->emergency_phone,
            'contact_one' => $request->contact_one,
            'contact_two' => $request->contact_two,
            'contact_email' => $request->contact_email,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'company_address' => $request->company_address,
            'short_note' => $request->short_note,
            'account_opening_date' => $request->account_opening_date,
            'reporter' => $request->reporter,
            'follower' => $request->follower,
            'account_note' => $request->account_note,
            'global_status' => $request->global_status,
        ]);

        return redirect()->route('vendor.index')
                        ->with('success','Vendor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vendor::find($id)->delete();
        return redirect()->route('vendor.index')
                        ->with('success','Vendor deleted successfully');
    }
}
