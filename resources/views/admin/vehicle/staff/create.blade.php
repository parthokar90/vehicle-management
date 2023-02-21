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


<div class="container-fluid">
    <div class="card">
    <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left pl-4 pt-4">
            <h2>Create New Staff</h2>
        </div>
        <div class="pull-right pt-4 pr-4">
            <a class="btn btn-primary" href="{{ route('vehicle-staff.index') }}"> Back</a>
        </div>
    </div>
</div>
        <div class="card-body">
-{!! Form::open(array('route' => 'vehicle-staff.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Staff ID:</strong>
            {!! Form::text('staff_id', null, array('placeholder' => 'Staff Id','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Staff Name:</strong>
            {!! Form::text('staff_name', null, array('placeholder' => 'Staff Name','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Father Name:</strong>
            {!! Form::text('father_name', null, array('placeholder' => 'Father Name','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Mother Name:</strong>
            {!! Form::text('mother_name', null, array('placeholder' => 'Mother Name','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Phone:</strong>
            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Contact One:</strong>
            {!! Form::text('contact_one', null, array('placeholder' => 'Contact One','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Contact Two:</strong>
            {!! Form::text('contact_two', null, array('placeholder' => 'Contact Two','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Date of Birth:</strong>
            {!! Form::date('date_of_birth', null, array('placeholder' => 'Date of birth','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Nid No:</strong>
            {!! Form::text('nid_no', null, array('placeholder' => 'Nid No','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Present Address:</strong>
            {!! Form::textarea('present_address', null, array('placeholder' => 'Present Address','class' => 'form-control','cols'=>2,'rows'=>2)) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Permanent Address:</strong>
            {!! Form::textarea('permanent_address', null, array('placeholder' => 'Permanent Address','class' => 'form-control','cols'=>2,'rows'=>2)) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Staff Type:</strong>
            <select class="form-control" name="staff_type">
                @foreach($type as $types)
                  <option value="{{$types->id}}">{{$types->staff_type}}</option>
                @endforeach 
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Work Experience:</strong>
            {!! Form::text('work_experience', null, array('placeholder' => 'Work Experience','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Previous Organisation:</strong>
            {!! Form::text('previous_organisation', null, array('placeholder' => 'Previous Organisation','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Assigned Vehicle:</strong>
            <select class="form-control" name="assigned_vehicle">
                @foreach($vehicle as $vehicles)
                  <option value="{{$vehicles->id}}">{{$vehicles->name}}</option>
                @endforeach 
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Profile Photo:</strong>
            {!! Form::file('profile_photo', null, array('placeholder' => 'Work Experience','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3">
        <div class="form-group">
            <strong>Status:</strong>
            <select class="form-control" name="status">
                  <option value="1">Active</option>
                  <option value="0">InActive</option>
            </select>
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}
        </div>
    </div>
</div>

</section>
@endsection