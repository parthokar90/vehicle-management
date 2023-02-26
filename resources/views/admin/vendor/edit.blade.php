@extends('layouts.app')

@section('content')
<section class="content pt-2">


<style>
.card_header{
    border-bottom:1px solid #ccc;
    padding:15px;
}
.kt-header--fixed .kt-wrapper{
    padding-top:0px!important;
}
.nav-link {
  color:#000000 !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 28px;
    padding: 1px 12px !important;
}


/* Select2 Bootstrap 4 Theme */
.select2-container--bootstrap {
  box-sizing: border-box !important;
  display: inline-block !important;
  margin: 0 !important;
  position: relative !important;
  vertical-align: middle !important;
}
.select2-container--bootstrap .select2-selection--single {
  background-color: #fff !important;
  border: 1px solid #ced4da !important;
  border-radius: 0.25rem!important;
  height: calc(2.25rem + 2px) !important;
  padding: 0.375rem 0.75rem !important;
}
.select2-container--bootstrap .select2-selection--single:focus {
  border-color: #80bdff !important;
  outline: 0 !important;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
}
.select2-container--bootstrap .select2-selection--single .select2-selection__rendered {
  color: #495057 !important;
  line-height: 1.5 !important;
}
.select2-container--bootstrap .select2-selection--single .select2-selection__arrow {
  height: calc(2.25rem + 2px) !important;
  position: absolute !important;
  top: 0.375rem !important;
  right: 0.75rem !important;
  width: 1.75rem !important;
}
.select2-container--bootstrap .select2-selection--single .select2-selection__arrow b {
  border-color: #555 transparent transparent transparent !important;
  border-style: solid !important;
  border-width: 0.3rem 0.3rem 0 0.3rem !important;
  height: 0 !important;
  left: 50% !important;
  margin-left: -0.15rem !important;
  margin-top: -0.15rem !important;
  position: absolute !important;
  top: 50% !important;
  width: 0 !important;
}

.select2-container .select2-selection--single {
  margin-top:10px !important;  
  height: 30px !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 26px;
    position: absolute;
    top: 25px !important;
    right: 1px;
    width: 20px;
}

.form-control {
    margin-top:10px !important;  
    height: 30px;
    padding: 5px 12px;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #e2e5ec;
    border-radius: 4px;
    float:right;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
</style>

<div class="container-fluid">
    <div class="card">
        <div class="col-lg-12 card_header">
            <h5> <i class="flaticon2-shelter"></i> Add Vendor</h5>
        </div>
    </div>
</div>


<div class="container-fluid">
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif
    <div class="card">
    <div class="col-lg-12 card_header">
    <h5> <i class="flaticon2-shelter"></i> Add Vendor</h5>
</div>

<div class="card-body">

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
{!! Form::model($user, ['method' => 'PATCH','route' => ['vendor.update', $user->id]]) !!}
<!-- nav start -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Contact Details</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" id="a-tab" data-toggle="tab" href="#contacts" role="tab" aria-controls="contact" aria-selected="false">Account Details</a>
    </li>
</ul>
<!-- nav end -->


<div class="tab-content" id="myTabContent">


<!-- start -->
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="container">

        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label"><strong>Vendor Type:*</strong></label>
        <div class="col-sm-9">
        <select class="form-control select_two" name="vendor_type">
            <option value="">Select</option>
               @foreach($vendorType as $types)
                <option value="{{$types->id}}" @if($user->vendor_type==$types->id) selected @endif>{{$types->type}}</option>  
                @endforeach                        
            <select>
        </div>
        </div>




        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">  <strong>Vendor Name:*</strong></label>
        <div class="col-sm-9">
        {!! Form::text('vendor_name', null, array('placeholder' => 'Vendor Name','class' => 'form-control')) !!}
        </div>
        </div>




        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label"> <strong>Company Name:*</strong></label>
        <div class="col-sm-9">
         {!! Form::text('company_name', null, array('placeholder' => 'Company Name','class' => 'form-control')) !!}
        </div>
        </div>


        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label"> <strong>Division:*</strong></label>
        <div class="col-sm-9">
        <select class="form-control select_two" name="division">
            <option value="">Select</option>
               @foreach($division as $divisions)
                 <option value="{{$divisions->id}}" @if($divisions->id==$user->division) selected @endif>{{$divisions->division_name}}</option>    
               @endforeach                           
            <select>
        </div>
        </div>

        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">  <strong>District:*</strong></label>
        <div class="col-sm-9">
        <select class="form-control select_two" name="district">
               <option value="">Select</option>
               @foreach($district as $districts)
                 <option value="{{$districts->id}}" @if($user->district==$districts->id) selected @endif>{{$districts->district_name}}</option>    
               @endforeach            
            <select>
        </div>
        </div>

        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">  <strong>Thana:*</strong></label>
        <div class="col-sm-9">
        <select class="form-control select_two" name="thana">
                <option value="">Select</option>              
                @foreach($thana as $thanas)
                  <option value="{{$thanas->id}}" @if($thanas->id==$user->thana) selected @endif>{{$thanas->thana_name}}</option>    
                @endforeach               
            <select>
        </div>
        </div>


        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">   <strong>NID No:*</strong>></label>
        <div class="col-sm-9">
        {!! Form::text('nid_no', null, array('placeholder' => 'NID No','class' => 'form-control')) !!}
        </div>
        </div>

    </div>
  </div>
  <!-- end -->

  <!-- start -->
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    

  <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">        <strong>Present Address:</strong></label>
        <div class="col-sm-9">
        {!! Form::textarea('present_address', null, array('placeholder' => 'Present Address','class' => 'form-control','cols'=>3,'rows'=>3)) !!}
        </div>
        </div>


        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">  <strong>Permanent  Address:</strong></label>
        <div class="col-sm-9">
        {!! Form::textarea('permanent_address', null, array('placeholder' => 'Permanent Address','class' => 'form-control','cols'=>3,'rows'=>3)) !!}
        </div>
        </div>


        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">  <strong>Billing  Address:*</strong></label>
        <div class="col-sm-9">
        {!! Form::textarea('billing_address', null, array('placeholder' => 'Billing Address','class' => 'form-control','cols'=>3,'rows'=>3)) !!}
        </div>
        </div>


        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">    <strong>SMS  Phone:*</strong></label>
        <div class="col-sm-9">
        {!! Form::text('sms_phone', null, array('placeholder' => 'SMS Phone','class' => 'form-control')) !!}
        </div>
        </div>



        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">     <strong>Emergency  Phone:</strong></label>
        <div class="col-sm-9">
        {!! Form::text('emergency_phone', null, array('placeholder' => 'Emergency Phone','class' => 'form-control')) !!}
        </div>
        </div>



        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">  <strong>Contact One :*</strong></label>
        <div class="col-sm-9">
        {!! Form::text('contact_one', null, array('placeholder' => 'Contact One','class' => 'form-control')) !!}
        </div>
        </div>



        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">       <strong>Contact Two:</strong></label>
        <div class="col-sm-9">
        {!! Form::text('contact_two', null, array('placeholder' => 'Contact Two','class' => 'form-control')) !!}
        </div>
        </div>



        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">           <strong>Contact Email:*</strong></label>
        <div class="col-sm-9">
        {!! Form::text('contact_email', null, array('placeholder' => 'Contact Email','class' => 'form-control')) !!}
        </div>
        </div>



        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">      <strong>Latitude:</strong></label>
        <div class="col-sm-9">
        {!! Form::text('latitude', null, array('placeholder' => 'Latitude','class' => 'form-control')) !!}
        </div>
        </div>


        
        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">        <strong>Longitude:</strong></label>
        <div class="col-sm-9">
        {!! Form::text('longitude', null, array('placeholder' => 'Longitude','class' => 'form-control')) !!}
        </div>
        </div>


        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">          <strong>Company  Address:</strong></label>
        <div class="col-sm-9">
        {!! Form::textarea('company_address', null, array('placeholder' => 'Company Address','class' => 'form-control','cols'=>3,'rows'=>3)) !!}
        </div>
        </div>


        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">  <strong>Short Note:</strong></label>
        <div class="col-sm-9">
        {!! Form::textarea('short_note', null, array('placeholder' => 'Short Note','class' => 'form-control','cols'=>3,'rows'=>3)) !!}
        </div>
        </div>


  </div>
  <!-- end -->


  <!-- tab start -->
  <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contact-tab">



        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">  <strong>A/C Opening Date :*</strong></label>
        <div class="col-sm-9">
        {!! Form::date('account_opening_date', null, array('placeholder' => 'A/C Opening  Date','class' => 'form-control')) !!}
        </div>
        </div>



        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label"> <strong>Reporter:</strong></label>
        <div class="col-sm-9">
        <select class="form-control" name="reporter">
                  <option value="">Select</option>  
                  @foreach($users as $userss)
                    <option value="{{$userss->id}}" @if($userss->id==$user->reporter) selected @endif>{{$userss->name}}</option>    
                  @endforeach              
                <select>
        </div>
        </div>



        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">     <strong>Follower:</strong></label>
        <div class="col-sm-9">
        <select class="form-control " name="follower">
                  <option value="">Select</option>  
                  @foreach($users as $userss)
                    <option value="{{$userss->id}}" @if($userss->id==$user->follower) selected @endif>{{$userss->name}}</option>    
                  @endforeach           
                <select>
        </div>
        </div>


        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">    <strong>Account  Note:</strong></label>
        <div class="col-sm-9">
        {!! Form::textarea('account_note', null, array('placeholder' => 'Account Note','class' => 'form-control','cols'=>3,'rows'=>3)) !!}
        </div>
        </div>

        
        <div class="form-group row">
        <label for="inputName" class="col-sm-3 col-form-label">  <strong>Global  Status: *</strong></label>
        <div class="col-sm-9">
        <select class="form-control " name="global_status">
            <option value="">Select</option>
            <option value="1" @if($user->global_status==1) selected @endif>Inactive</option>              
                    <option value="2" @if($user->global_status==2) selected @endif>Active</option>              
                    <option value="3" @if($user->global_status==3) selected @endif>Over due</option>              
                    <option value="4" @if($user->global_status==4) selected @endif>On Hold</option>              
                    <option value="5" @if($user->global_status==5) selected @endif>Stop</option>               
            <select>
        </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
    <button type="reset" class="btn btn-danger mt-3" style="float:left">Reset</button>
        <button type="submit" class="btn btn-primary mt-3" style="float:right">Submit</button>
    </div>



  </div>
  <!-- tab end -->
</div>

{!! Form::close() !!}
</div>

<div class="col-md-2">

</div>



</div>


</div>
</section>
@endsection