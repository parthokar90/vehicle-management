@extends('layouts.app')
@section('content')
<section class="content">



@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div. class="card">
<div class="container-fluid">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left  pt-4">
            <h2>Vehicle Type Management</h2>
        </div>
     </div>
  <div class="card-body">

        <div class="pull-right pt-4 pb-4">
            <a class="btn btn-success" href="{{ route('vehicle-type.create') }}"> <i class="fa fa-plus"></i> Create New Type</a>
        </div>
 
        <table id="example" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($data as $key=> $item)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$item->vehicle_type}}</td>
                <td>
                <a class="btn btn-info btn-sm" href="{{ route('vehicle-type.show',$item->id) }}">Show</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('vehicle-type.edit',$item->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['vehicle-type.destroy', $item->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>    
           @endforeach 
        </tbody>
    </table>
</div>
</section>
@endsection