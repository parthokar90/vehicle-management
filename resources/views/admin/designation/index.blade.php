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
            <h2>Designation Management</h2>
        </div>
     </div>
  <div class="card-body">

        <div class="pull-right pt-4 pb-4">
            <a class="btn btn-success" href="{{ route('designation.create') }}"> <i class="fa fa-plus"></i> Create New Designation</a>
        </div>

<table id="example" class="table table-bordered">
<thead>
 <tr>
   <th>No</th>
   <th>Department</th>
   <th>Designation</th>
   <th width="280px">Action</th>
 </tr>
</thead>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->department->name }}</td>
    <td>{{ $user->designation_name }}</td>
    <td>
       <a class="btn btn-info" href="{{ route('designation.show',$user->id) }}">Show</a>

       <a class="btn btn-primary" href="{{ route('designation.edit',$user->id) }}">Edit</a>

        {!! Form::open(['method' => 'DELETE','route' => ['designation.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}

    </td>
  </tr>
 @endforeach
</table>
</div>
</div>





</section>
@endsection