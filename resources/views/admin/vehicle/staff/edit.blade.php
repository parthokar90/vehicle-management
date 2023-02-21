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
</style>


<div class="container-fluid">
    <div class="card">
        <div class="col-lg-12 card_header">
            <h5> <i class="flaticon2-shelter"></i> Edit Staff</h5>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
    <div class="col-lg-12 card_header">
    Edit  Staff
    </div>
    <div class="card-body">
    <div class="row">
  
</div>
{!! Form::model($user, ['method' => 'PATCH','enctype'=>'multipart/form-data','route' => ['vehicle-staff.update', $user->id]]) !!}
<div class="row">

<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Staff ID:</strong>
            {!! Form::text('staff_id', null, array('placeholder' => 'Staff Id','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Staff Name:</strong>
            {!! Form::text('staff_name', null, array('placeholder' => 'Staff Name','class' => 'form-control')) !!}
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
            <strong>Phone:</strong>
            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Contact One:</strong>
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
            <strong>Date of Birth:</strong>
            {!! Form::date('date_of_birth', null, array('placeholder' => 'Date of birth','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nid No:</strong>
            {!! Form::text('nid_no', null, array('placeholder' => 'Nid No','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Present Address:</strong>
            {!! Form::textarea('present_address', null, array('placeholder' => 'Present Address','class' => 'form-control','cols'=>2,'rows'=>2)) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permanent Address:</strong>
            {!! Form::textarea('permanent_address', null, array('placeholder' => 'Permanent Address','class' => 'form-control','cols'=>2,'rows'=>2)) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Staff Type:</strong>
            <select class="form-control" name="staff_type">
                @foreach($type as $types)
                  <option value="{{$types->id}}" @if($user->staff_type==$types->id) selected @endif>{{$types->staff_type}}</option>
                @endforeach 
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Work Experience:</strong>
            {!! Form::text('work_experience', null, array('placeholder' => 'Work Experience','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Previous Organisation:</strong>
            {!! Form::text('previous_organisation', null, array('placeholder' => 'Previous Organisation','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Assigned Vehicle:</strong>
            <select class="form-control" name="assigned_vehicle">
                @foreach($vehicle as $vehicles)
                  <option value="{{$vehicles->id}}" @if($user->assigned_vehicle==$vehicles->id) selected @endif>{{$vehicles->name}}</option>
                @endforeach 
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Profile Photo:</strong><br>
            <img class="img-fluid" width="80px" height="80px" src="{{asset('admin/vehicle/staff/'.$user->profile_photo)}}">
            {!! Form::file('profile_photo', null, array('placeholder' => 'Work Experience','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Status:</strong>
            <select class="form-control" name="status">
                  <option value="1" @if($user->status==1) selected @endif>Active</option>
                  <option value="0" @if($user->status==0) selected @endif>InActive</option>
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <button type="reset" class="btn btn-danger" style="float:left">Reset</button>
        <button type="submit" class="btn btn-primary" style="float:right">Submit</button>
    </div>
</div>
{!! Form::close() !!}

</div>
</div>
</div>


</section>
@endsection