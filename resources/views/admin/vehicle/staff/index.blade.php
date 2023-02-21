@extends('layouts.app')

@section('content')
<section class="content">

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="card">
<div class="container-fluid">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left  pt-4">
            <h2>Vehicle Staff Management</h2>
        </div>
     </div>
  <div class="card-body">
        <div class="pull-right pt-4 pb-4">
            <a class="btn btn-success" href="{{ route('vehicle-staff.create') }}"> <i class="fa fa-plus"></i> Create New Staff</a>
        </div>
        <table id="example" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Photo</th>
                <th>Staff ID</th>
                <th>Staff name</th>
                <th>Staff Type</th>
                <th>Phone</th>
                <th>Assigned vehicle</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($data as $key=> $item)
            <tr>
                <td>{{++$key}}</td>
                <td><img class="img-fluid" width="40px" src="{{asset('admin/vehicle/staff/'.$item->profile_photo)}}"></td>
                <td>{{$item->staff_id}}</td>
                <td>{{$item->staff_name}}</td>
                <td>{{optional($item->staffType)->staff_type}}</td>
                <td>{{$item->phone}}</td>
                <td>{{optional($item->assignedVehicle)->name}}</td>
                <td>
                <a class="btn btn-info btn-sm" href="{{ route('vehicle-staff.show',$item->id) }}">Show</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('vehicle-staff.edit',$item->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['vehicle-staff.destroy', $item->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>    
           @endforeach 
        </tbody>
    </table>
</div>
</div>
</section>
@endsection