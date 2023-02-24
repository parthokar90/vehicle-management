@extends('layouts.app')


@section('content')
<section class="content pt-2">

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


<style>
.form-control {
    width: 80%;
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
.card-body {
    flex: 1 1 auto;
    padding: 10px 300px;
}
.card_header{
    border-bottom:1px solid #ccc;
    padding:15px;
}
.kt-header--fixed .kt-wrapper{
    padding-top:0px!important;
}
.card{
    margin:10px;
}
.nav-link {
  color:#000000 !important;
}
</style>


<div class="container-fluid">
    <div class="card">
        <div class="col-lg-12 card_header">
            <h5> <i class="flaticon2-shelter"></i> Edit Customer</h5>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="card">
    <div class="col-lg-12 card_header">
    Edit Customer
    </div>
    <div class="row">
  
</div>
        <div class="card-body">
        {!! Form::model($user, ['method' => 'PATCH','route' => ['customer.update', $user->id]]) !!}



<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Contact Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Platform Info</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="a-tab" data-toggle="tab" href="#contacts" role="tab" aria-controls="contact" aria-selected="false">Account Details</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Customer Group:*</strong>
            <select class="form-control" name="customer_group">
            <option value="">Select</option>
                <option value="01" @if($user->customer_group==01) selected @endif>01</option>              
                <option value="02" @if($user->customer_group==02) selected @endif>02</option>              
                <option value="03" @if($user->customer_group==03) selected @endif>03</option>              
                <option value="04" @if($user->customer_group==04) selected @endif>04</option>              
            <select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Employee:</strong>
            <select class="form-control" name="employee">
            <option value="">Select</option>             
                @foreach($users as $userss)
                 <option value="{{$userss->id}}" @if($userss->id==$user->employee) selected @endif>{{$userss->name}}</option>    
               @endforeach                
            <select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Customer Name:*</strong>
            {!! Form::text('customer_name', null, array('placeholder' => 'Customer Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Company Name:*</strong>
            {!! Form::text('company_name', null, array('placeholder' => 'Company Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Father Name:</strong>
            {!! Form::text('father_name', null, array('placeholder' => 'Father Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Mother Name:</strong>
            {!! Form::text('mother_name', null, array('placeholder' => 'Mother Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date of Birth:*</strong>
            {!! Form::date('date_of_birth', null, array('placeholder' => 'Date of Birth','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Division:*</strong>
            <select class="form-control" name="division">
            <option value="">Select</option>
              @foreach($division as $divisions)
                 <option value="{{$divisions->id}}" @if($divisions->id==$user->division) selected @endif>{{$divisions->division_name}}</option>    
               @endforeach                         
            <select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>District:*</strong>
            <select class="form-control" name="district">
               <option value="">Select</option>
               @foreach($district as $districts)
                 <option value="{{$districts->id}}" @if($districts->id==$user->district) selected @endif>{{$districts->district_name}}</option>    
               @endforeach              
            <select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Thana:*</strong>
            <select class="form-control" name="thana">
                <option value="">Select</option>              
                @foreach($thana as $thanas)
                  <option value="{{$thanas->id}}" @if($thanas->id==$user->thana) selected @endif>{{$thanas->thana_name}}</option>    
                @endforeach                  
            <select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>NID No:*</strong>
            {!! Form::text('nid_no', null, array('placeholder' => 'NID No','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Gender:</strong>
            <select class="form-control" name="gender">
                <option value="1" @if($user->gender==1) selected @endif>Male</option>              
                <option value="2" @if($user->gender==2) selected @endif>Female</option>              
            <select>
        </div>
    </div>
</div>
  </div>


  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

     <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Present Address:</strong>
              {!! Form::textarea('present_address', null, array('placeholder' => 'Present Address','class' => 'form-control','cols'=>3,'rows'=>3)) !!}
          </div>
      </div>
      <br>  
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Permanent <br> Address:</strong>
              {!! Form::textarea('permanent_address', null, array('placeholder' => 'Permanent Address','class' => 'form-control','cols'=>3,'rows'=>3)) !!}
          </div>
      </div>
      <br>   
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Billing <br> Address:*</strong>
              {!! Form::textarea('billing_address', null, array('placeholder' => 'Billing Address','class' => 'form-control','cols'=>3,'rows'=>3)) !!}
          </div>
      </div>
      <br>   
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>SMS <br> Phone:*</strong>
            {!! Form::text('sms_phone', null, array('placeholder' => 'SMS Phone','class' => 'form-control')) !!}
        </div>
    </div>
 
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Emergency <br> Phone:</strong>
            {!! Form::text('emergency_phone', null, array('placeholder' => 'Emergency Phone','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contact One :*</strong>
            {!! Form::text('contact_one', null, array('placeholder' => 'Contact One','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contact Two:</strong>
            {!! Form::text('contact_two', null, array('placeholder' => 'Contact Two','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contact Email:*</strong>
            {!! Form::text('contact_email', null, array('placeholder' => 'Contact Email','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Latitude:</strong>
            {!! Form::text('latitude', null, array('placeholder' => 'Latitude','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Longitude:</strong>
            {!! Form::text('longitude', null, array('placeholder' => 'Longitude','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Company <br> Address:</strong>
              {!! Form::textarea('company_address', null, array('placeholder' => 'Company Address','class' => 'form-control','cols'=>3,'rows'=>3)) !!}
          </div>
      </div>

      <br>

    <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Short Note:</strong>
              {!! Form::textarea('short_note', null, array('placeholder' => 'Short Note','class' => 'form-control','cols'=>3,'rows'=>3)) !!}
          </div>
      </div>


  </div>


  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Platform <br> Username:*</strong>
                {!! Form::text('platform_username', null, array('placeholder' => 'Platform Username','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Platform <br> Password:*</strong>
                {!! Form::text('platform_password', null, array('placeholder' => 'Platform Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>System <br> Username :*</strong>
                {!! Form::text('system_username', null, array('placeholder' => 'System Username','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>System <br> Password:*</strong>
                {!! Form::text('system_password', null, array('placeholder' => 'System Password','class' => 'form-control')) !!}
            </div>
        </div>
  </div>


  <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contact-tab">


         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="text-break" style="width: 6rem;">Customer  Due <br> Limit :*</strong>
                {!! Form::text('customer_due_limit', null, array('placeholder' => 'Customer Due Limit','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="text-break" style="width: 6rem;">Collection <br>  Method:*</strong>
                <select class="form-control" name="collection_method">
                  <option value="">Select</option>  
                  @foreach($collections as $collectionss)
                    <option value="{{$collectionss->id}}" @if($collectionss->id==$user->collection_method) selected @endif>{{$collectionss->collection}}</option>    
                  @endforeach            
                <select>
            </div>
       </div>

       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="text-wrap" style="width: 6rem;">A/C  Opening <br>  Date :*</strong>
                {!! Form::date('account_opening_date', null, array('placeholder' => 'A/C Opening  Date','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Reporter:</strong>
                <select class="form-control" name="reporter">
                  <option value="">Select</option>  
                  @foreach($users as $userss)
                 <option value="{{$userss->id}}" @if($userss->id==$user->reporter) selected @endif>{{$userss->name}}</option>    
               @endforeach           
                <select>
            </div>
       </div>

       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Follower:</strong>
                <select class="form-control" name="follower">
                  <option value="">Select</option>  
                  @foreach($users as $userss)
                    <option value="{{$userss->id}}" @if($userss->id==$user->follower) selected @endif>{{$userss->name}}</option>    
                  @endforeach           
                <select>
            </div>
       </div>

       <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong class="text-wrap" style="width: 6rem;">Account  Note:</strong>
              {!! Form::textarea('account_note', null, array('placeholder' => 'Account Note','class' => 'form-control','cols'=>3,'rows'=>3)) !!}
          </div>
      </div>

      <br>
      <br>
      <br>
      <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="text-wrap" style="width: 6rem;">Global  Status: *</strong>
                <select class="form-control" name="global_status">
                  <option value="">Select</option>  
                    <option value="1"  @if($user->global_status==1) selected @endif>Inactive</option>              
                    <option value="2"  @if($user->global_status==2) selected @endif>Active</option>              
                    <option value="3"  @if($user->global_status==3) selected @endif>Over due</option>              
                    <option value="4"  @if($user->global_status==4) selected @endif>On Hold</option>              
                    <option value="5"  @if($user->global_status==5) selected @endif>Stop</option>              
                <select>
            </div>
       </div>


  <div class="col-xs-12 col-sm-12 col-md-12">
        <button type="reset" class="btn btn-danger" style="float:left">Reset</button>
        <button type="submit" class="btn btn-primary" style="float:right">Submit</button>
    </div>
  </div>


</div>

{!! Form::close() !!}
        </div>
    </div>
</div>

</section>
@endsection