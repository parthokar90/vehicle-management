<?php

namespace App\Http\Controllers\admin\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::orderBy('id','DESC')->get();
        return view('admin.customer.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.customer.create');
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
            'customer_group' => 'required',
            'customer_name' => 'required',
            'company_name' => 'required',
            'date_of_birth' => 'required',
            'division' => 'required',
            'district' => 'required',
            'thana' => 'required',
            'nid_no' => 'required',
            'billing_address' => 'required',
            'contact_one' => 'required',
            'contact_email' => 'required',
            'platform_username' => 'required',
            'platform_password' => 'required',
            'system_username' => 'required',
            'system_password' => 'required',
            'customer_due_limit' => 'required',
            'collection_method' => 'required',
            'account_opening_date' => 'required',
            'global_status' => 'required',
        ]);
    
        $input = [
            'customer_group' => $request->customer_group,
            'employee' => $request->employee,
            'customer_name' => $request->customer_name,
            'company_name' => $request->company_name,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'date_of_birth' => $request->date_of_birth,
            'division' => $request->division,
            'district' => $request->district,
            'thana' => $request->thana,
            'nid_no' => $request->nid_no,
            'gender' => $request->gender,
            'present_address' => $request->present_address,
            'permanent_address' => $request->permanent_address,
            'billing_address' => $request->billing_address,
            'sms_phone' => $request->sms_phone,
            'emergency_phone' => $request->emergency_phone,
            'contact_one' => $request->contact_one,
            'contact_two' => $request->contact_two,
            'contact_email' => $request->contact_email,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'company_address' => $request->company_address,
            'short_note' => $request->short_note,
            'platform_username' => $request->platform_username,
            'platform_password' => $request->platform_password,
            'system_username' => $request->system_username,
            'system_password' => $request->system_password,
            'customer_due_limit' => $request->customer_due_limit,
            'collection_method' => $request->collection_method,
            'account_opening_date' => $request->account_opening_date,
            'reporter' => $request->reporter,
            'follower' => $request->follower,
            'account_note' => $request->account_note,
            'global_status' => $request->global_status,
        ];

        $user = Customer::insert($input);
    
        return redirect()->route('customer.index')
                        ->with('success','Customer created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
