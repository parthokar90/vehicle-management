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
            <h5> <i class="flaticon2-shelter"></i> Edit Vehicle</h5>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="card">
    <div class="col-lg-12 card_header">
    Edit Vehicle
    </div>
    <div class="card-body">
    <div class="row">
    
</div>
{!! Form::model($data, ['method' => 'PATCH', 'enctype'=>'multipart/form-data',  'route' => ['vehicle.update', $data->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Vehicle Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Vehicle Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Vehicle Plate No:</strong>
            {!! Form::text('plate_no', null, array('placeholder' => 'Vehicle Plate No','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Vehicle Type:</strong>
            <select class="form-control" name="type">
               @foreach($type as $types)
                  <option value="{{$types->id}}" @if($types->id==$data->type) selected @endif>{{$types->vehicle_type}}</option>
                @endforeach 
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Model Name:</strong>
            {!! Form::text('model', null, array('placeholder' => 'Model Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Vehicle Color:</strong>
            {!! Form::text('color', null, array('placeholder' => 'Vehicle Color','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Vehicle Year:</strong>
            {!! Form::text('year', null, array('placeholder' => 'Vehicle Year','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Vehicle Engine No:</strong>
            {!! Form::text('engine_no', null, array('placeholder' => 'Vehicle Engine No','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Avarage Mileage:</strong>
            {!! Form::text('milage', null, array('placeholder' => 'Avarage Mileage','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Vehicle <br> Ownership:</strong>
            <select class="form-control" name="owner_ship">
                @foreach($ownership as $ownerships)
                  <option value="{{$ownerships->id}}" @if($ownerships->id==$data->owner_ship) selected @endif>{{$ownerships->vehicle_ownership}}</option>
                @endforeach 
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Vehicle Group:</strong>
            <select class="form-control" name="group_id">
                @foreach($group as $groups) 
                    <option value="{{$groups->id}}" @if($groups->id==$data->group_id) selected @endif>{{$groups->group}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Photo:</strong>
            <img class="img-fluid" width="40px" src="{{asset('admin/vehicle/'.$data->photo)}}">
            <input type="file" name="photo" class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Vehicle Status:</strong>
            <select class="form-control" name="status">
                @foreach($status as $statuss)
                  <option value="{{$statuss->id}}" @if($statuss->id==$data->status) selected @endif>{{$statuss->vehicle_status}}</option>
                @endforeach 
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