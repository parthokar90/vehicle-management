@extends('layouts.app')


@section('content')
<section class="content">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Department Management</h2>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div. class="card">
  <div class="card-body">

        <div class="pull-right pt-4 pb-4">
            <a class="btn btn-success" href="{{ route('department.create') }}"> <i class="fa fa-plus"></i> Create New Department</a>
        </div>
 
<table id="example" class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Department</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>
       <a class="btn btn-info" href="{{ route('department.show',$user->id) }}">Show</a>

       <a class="btn btn-primary" href="{{ route('department.edit',$user->id) }}">Edit</a>
 
        {!! Form::open(['method' => 'DELETE','route' => ['department.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    
    </td>
  </tr>
 @endforeach
</table>
</div>
</div.


{!! $data->render() !!}


</section>
@endsection