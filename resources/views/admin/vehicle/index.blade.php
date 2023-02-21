@extends('layouts.app')

@section('content')
<section class="content">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Vehicle Management</h2>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
<div class="card">
  <div class="card-body">
        <div class="pull-right pt-4 pb-4">
            <a class="btn btn-success" href="{{ route('vehicle.create') }}"> <i class="fa fa-plus"></i> Create New Vehicle</a>
        </div>
        <table id="example" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Photo</th>
                <th>Vehicle No</th>
                <th>Vehicle Type</th>
                <th>Ownership</th>
                <th>Status</th>
                <th>Vehicle Group</th>
                <th>Assign Staff</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($data as $key=> $item)
            <tr>
                <td>{{++$key}}</td>
                <td><img class="img-fluid" width="40px" src="{{asset('admin/vehicle/'.$item->photo)}}"></td>
                <td>{{$item->plate_no}}</td>
                <td>{{$item->type}} {{optional($item->vehicleGroup)->group}}</td>
                <td>{{optional($item->vehicleType)->vehicle_type}}</td>
                <td>{{optional($item->vehicleOwnership)->vehicle_ownership}}</td>
                <td>{{optional($item->vehicleStatus)->vehicle_status}}</td>
                <td>
                    @foreach($item->assignedStaff as $assign)
                     <li style="list-style:none"> {{$assign->staff_name}}</li>
                    @endforeach
                </td>
                <td>
                <a class="btn btn-info btn-sm" href="{{ route('vehicle.show',$item->id) }}">Show</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('vehicle.edit',$item->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['vehicle.destroy', $item->id],'style'=>'display:inline']) !!}
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